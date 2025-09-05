#!/usr/bin/env bash

cd ..

VERSION=${1:-test}

docker build -t commnerd/personal:${VERSION} .
