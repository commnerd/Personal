#!/bin/bash

BASEPATH=$(cd $(dirname ${BASH_SOURCE[0]}); pwd -P)
cd $BASEPATH;

ORIGIN=$(git remote -v | grep origin | grep fetch | awk '{print $2}')
FILENAME=$(basename $1)

if [ -d /tmp/backup ]
then
    rm -fR /tmp/backup
fi

# GET RELEASE
cd /tmp
wget $1
tar -xvf $FILENAME
rm $FILENAME
CODEBASE=$(ls | grep commnerd-Personal)
cp -fR $BASEPATH/.env $CODEBASE
cd $CODEBASE

# CONFIGURE RELEASE
composer install
npm install
php artisan migrate