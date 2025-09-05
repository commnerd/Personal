FROM sail-8.4/app

ENV APP_KEY=base64:rly8Pz8rt+xmg6r/YWb9s6TwTCHNlqCXYFyyF0qfwdY=
ENV APP_ENV=production
ENV DB_CONNECTION=sqlite
ENV DB_DATABASE=/var/www/html/database/database.sqlite

ADD . /var/www/html

RUN rm -fR /var/www/html/node_modules && \
    rm -fR /var/www/html/tests

RUN echo "" > /var/www/html/storage/logs/laravel.log && \
    echo "" > /var/www/html/database/database.sqlite && \
    php artisan migrate --force

RUN rm -fR /var/www/html/vendor && \
    composer install --no-dev && \
    yarn && \
    yarn build

RUN php artisan storage:link

RUN chmod -R 777 /var/www/html/storage && \
    chmod -R 777 /var/www/html/database/database.sqlite

RUN rm /var/www/html/.env
