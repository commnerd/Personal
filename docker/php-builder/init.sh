#!/bin/sh -e

cp .env.docker .env

php artisan key:generate

touch storage/.mysql-init

while ! mysqladmin ping -h"mysql" --silent; do
    sleep 1
done

exec "$@"

exit 0
