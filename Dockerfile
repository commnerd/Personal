FROM php:8.4-fpm-alpine

# Install system dependencies
RUN apk add --no-cache \
    git \
    curl \
    libpng-dev \
    libxml2-dev \
    zip \
    unzip \
    sqlite \
    nodejs \
    npm

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql pdo_sqlite mbstring exif pcntl bcmath gd

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

ENV APP_KEY=base64:rly8Pz8rt+xmg6r/YWb9s6TwTCHNlqCXYFyyF0qfwdY=
ENV APP_ENV=production
ENV DB_CONNECTION=sqlite
ENV DB_DATABASE=/var/www/html/database/database.sqlite

# Copy application files
COPY . /var/www/html

RUN rm -fR /var/www/html/node_modules && \
    rm -fR /var/www/html/tests

RUN echo "" > /var/www/html/storage/logs/laravel.log && \
    echo "" > /var/www/html/database/database.sqlite && \
    php artisan migrate --force

RUN rm -fR /var/www/html/vendor && \
    composer install --no-dev --optimize-autoloader

RUN php artisan storage:link

RUN chmod -R 777 /var/www/html/storage && \
    chmod -R 777 /var/www/html/database/database.sqlite

RUN rm /var/www/html/.env
