#!/bin/bash

BASE_PATH=$(cd $(dirname ${BASH_SOURCE[0]}); pwd -P)
cd $BASE_PATH;

ORIGIN=$(git remote -v | grep origin | grep fetch | awk '{print $2}')

echo $3 > /tmp/test
