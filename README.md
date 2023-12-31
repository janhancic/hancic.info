# hancic.info

Source code for my personal website https://hancic.info

## Development

This is a static website built using [Hugo](https://gohugo.io/)

All dependencies are obtained with the `./get_deps.sh` script which will download all the
necessary binaries into the `bin` folder inside the repo folder. The website is meant to
be built using these binaries as they are pinned to a specific version.

### Terraform
The website is deployed onto CloudFlare Pages which is managed with Terraform defined
in the `tf` folder. All changes are applied manually (i.e. there is no CI/CD).

_Note:_ If setting this up on a new CloudFlare account, you have to connect CloudFlare to
your GitHub account and give it access to the repo where the website is stored. See
[this guide](https://developers.cloudflare.com/pages/get-started/guide/#connect-your-git-provider-to-pages).

The following are the commands typically used to make changes to the infrastructure of 
this website.

```bash
./get_deps.sh
cd tf/
# Follow https://developers.cloudflare.com/fundamentals/api/get-started/create-token/
# to generate a token that can be used.
export CLOUDFLARE_API_TOKEN=<token>
# Only run this the first time / on a new machine.
../bin/terraform init
../bin/terraform plan
../bin/terraform apply
```

You either need to create a `terraform.tfvars`` or provide the required variables
to the terraform commands directly with `-var var_name=foo` e.g. `../bin/terraform apply -var cf_account_id=XZY`

#### terraform.tfstate

The state file is not checked-in into the repo. While nobody else will work on this repo and
run terraform commands against my personal CloudFlare account, the file could contain some
sensitive information.

At the moment it is simply stored on my computer (with a decent-ish manual backup).
