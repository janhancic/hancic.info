terraform {
  required_providers {
    cloudflare = {
      source  = "cloudflare/cloudflare"
      version = "~> 4"
    }
  }
}

provider "cloudflare" {
  # token pulled from $CLOUDFLARE_API_TOKEN
}

variable "cf_account_id" {
  type    = string
}

variable "domain_name" {
  default = "hancic.info"
  type    = string
}

resource "cloudflare_pages_project" "hancic_info_pages_project" {
  account_id        = var.cf_account_id
  name              = "hancic-info"
  production_branch = "master"

  source {
    type = "github"
    config {
      owner                         = "janhancic"
      repo_name                     = var.domain_name
      production_branch             = "master"
      pr_comments_enabled           = true
      deployments_enabled           = true
      production_deployment_enabled = true
      preview_deployment_setting    = "all"
      preview_branch_includes       = ["*"]
      preview_branch_excludes       = ["master"]
    }
  }

  build_config {
    build_command   = "hugo --gc --minify --baseURL $CF_PAGES_URL"
    destination_dir = "public"
    root_dir        = ""
  }

  deployment_configs {
    preview {
      environment_variables = {
        HUGO_VERSION : "0.121.1" # TODO: this should be defined once in the repo (it is also defined in get_deps.sh)
      }
      fail_open = true
    }
    production {
      environment_variables = {
        HUGO_VERSION : "0.121.1" # TODO: this should be defined once in the repo (it is also defined in get_deps.sh)
      }
      fail_open = true
    }
  }
}

resource "cloudflare_zone" "hancic_info_zone" {
  account_id = var.cf_account_id
  paused     = false
  plan       = "free"
  type       = "full"
  zone       = var.domain_name
}

resource "cloudflare_record" "hancic_info_record_root" {
  zone_id = cloudflare_zone.hancic_info_zone.id

  name    = var.domain_name
  proxied = true
  ttl     = 1
  type    = "CNAME"
  value   = "hancic-info.pages.dev"
}

resource "cloudflare_record" "hancic_info_record_www" {
  zone_id = cloudflare_zone.hancic_info_zone.id

  name    = "www.${var.domain_name}"
  proxied = true
  ttl     = 1
  type    = "CNAME"
  value   = "hancic-info.pages.dev"
}

resource "cloudflare_pages_domain" "hancic_info_domain" {
  account_id   = var.cf_account_id
  project_name = cloudflare_pages_project.hancic_info_pages_project.name
  domain       = var.domain_name
}

resource "cloudflare_pages_domain" "hancic_info_www_domain" {
  account_id   = var.cf_account_id
  project_name = cloudflare_pages_project.hancic_info_pages_project.name
  domain       = cloudflare_record.hancic_info_record_www.name
}

// MX records for Gmail
resource "cloudflare_record" "hancic_info_record_email_mx_1" {
  name     = var.domain_name
  priority = 1
  proxied  = false
  ttl      = 1
  type     = "MX"
  value    = "aspmx.l.google.com"
  zone_id  = cloudflare_zone.hancic_info_zone.id
}

resource "cloudflare_record" "hancic_info_record_email_mx_2" {
  name     = var.domain_name
  priority = 5
  proxied  = false
  ttl      = 1
  type     = "MX"
  value    = "alt2.aspmx.l.google.com"
  zone_id  = cloudflare_zone.hancic_info_zone.id
}

resource "cloudflare_record" "hancic_info_record_email_mx_3" {
  name     = var.domain_name
  priority = 5
  proxied  = false
  ttl      = 1
  type     = "MX"
  value    = "alt1.aspmx.l.google.com"
  zone_id  = cloudflare_zone.hancic_info_zone.id
}

resource "cloudflare_record" "hancic_info_record_email_mx_4" {
  name     = var.domain_name
  priority = 10
  proxied  = false
  ttl      = 1
  type     = "MX"
  value    = "alt4.aspmx.l.google.com"
  zone_id  = cloudflare_zone.hancic_info_zone.id
}

resource "cloudflare_record" "hancic_info_record_email_mx_5" {
  name     = var.domain_name
  priority = 10
  proxied  = false
  ttl      = 1
  type     = "MX"
  value    = "alt3.aspmx.l.google.com"
  zone_id  = cloudflare_zone.hancic_info_zone.id
}
