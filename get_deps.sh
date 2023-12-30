#!/bin/bash

set -euo pipefail

HUGO_VERSION="0.121.1"
TERRAFORM_VERSION="1.6.6"

echo "-> This script will install all the dependencies for building, deploying, etc. hancic.info"
echo "-> This only supports Linux x86 systems. If you want to run this on a different system you will have to modify this script"

echo "-> Creating tmp folders"
rm -rf tmp
mkdir -p tmp/hugo
mkdir -p tmp/terraform

echo "-> Creating bin folder"
mkdir -p bin

echo "-> Downloading Hugo version ${HUGO_VERSION}"
curl -Lk "https://github.com/gohugoio/hugo/releases/download/v${HUGO_VERSION}/hugo_extended_${HUGO_VERSION}_Linux-64bit.tar.gz" -o tmp/hugo/hugo.tar.gz
echo "-> Extracting Hugo to local bin folder"
tar -xvzf tmp/hugo/hugo.tar.gz -C tmp/hugo
cp tmp/hugo/hugo bin/

echo "-> Downloading Terraform version ${TERRAFORM_VERSION}"
curl -Lk "https://releases.hashicorp.com/terraform/${TERRAFORM_VERSION}/terraform_${TERRAFORM_VERSION}_linux_amd64.zip" -o tmp/terraform/terraform.zip
echo "-> Extracting Terraform to local bin folder"
unzip tmp/terraform/terraform.zip -d tmp/terraform
mv tmp/terraform/terraform bin/
