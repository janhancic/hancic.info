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

resource "cloudflare_pages_project" "hancic_info_pages_project" {
  account_id        = var.cf_account_id
  name              = "hancic-info"
  production_branch = "master"

  source {
    type = "github"
    config {
      owner                         = "janhancic"
      repo_name                     = "hancic.info"
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
