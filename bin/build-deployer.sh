#!/bin/bash

DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" >/dev/null 2>&1 && pwd )"

cd $DIR/../docker/deployer

docker build --squash -t commnerd/deployer:latest . || docker build -t commnerd/deployer:latest .

docker push commnerd/deployer:latest
