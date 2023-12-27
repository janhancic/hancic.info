#!/bin/bash

set -euo pipefail

HUGO_VERSION="0.121.1"

echo "This script will install all the dependencies for building, deploying, etc. hancic.info"
echo "This only supports Linux x86 systems. If you want to run this on a different system you will have to modify this script"

echo "Creating tmp folders"
rm -rf tmp
mkdir -p tmp/hugo

echo "Creating bin folder"
mkdir -p bin

echo "Downloading hugo version ${HUGO_VERSION}"
curl -Lk "https://github.com/gohugoio/hugo/releases/download/v0.121.1/hugo_${HUGO_VERSION}_Linux-64bit.tar.gz" -o tmp/hugo/hugo.tar.gz
echo "Extracting hugo to local bin folder"
tar -xvzf tmp/hugo/hugo.tar.gz -C tmp/hugo
cp tmp/hugo/hugo bin/
