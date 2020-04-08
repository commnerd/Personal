#!/bin/bash

cd /var/www/personal

if [ ! -f .env ]
then
	cp .env.docker .env
fi

if [ ! -d vendor ]
then
	cp docker/php-builder/index.html public
	cp docker/php-builder/orb-loader.gif public
fi

composer install

php artisan key:generate

php artisan migrate

php artisan db:seed --class=VoyagerDatabaseSeeder

php artisan hook:setup

php artisan voyager:admin commnerd@gmail.com

php artisan storage:link

php artisan passport:keys

php artisan canvas:install

php artisan passport:install

if [ -f public/index.html ]
then
	rm public/index.html
fi

if [ -f public/orb-loader.gif ]
then
	rm public/orb-loader.gif
fi

USER=$(stat -c '%u' storage)
GROUP=$(stat -c '%g' storage)

chown -fR ${USER}:${GROUP} .
chmod -fR a+w storage
