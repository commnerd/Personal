#!/bin/bash

BASEPATH=$(cd $(dirname ${BASH_SOURCE[0]}); pwd -P)
cd $BASEPATH;

if [ ! $1 ]
then
  echo "No target passed"
fi

FILENAME=$(basename $1)
echo $FILENAME

if [ -d /tmp/backup ]
then
  rm -fR /tmp/backup
fi

# GET RELEASE
cd /tmp
wget $1
tar -xvf $FILENAME
rm $FILENAME
CODEBASE=$(pwd)/$(ls | grep Personal)

# MOVE ASSETS OVER AND INITIALIZE
cp $BASEPATH/.env $CODEBASE
cp -fR $BASEPATH/storage $CODEBASE
cd $CODEBASE
composer install
npm install

# MOVE FILES INTO PLACE
mv $BASEPATH /tmp/backup && mv $CODEBASE $BASEPATH

# RESTART WORKERS
cd $BASEPATH
php artisan queue:restart