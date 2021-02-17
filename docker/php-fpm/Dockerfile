FROM php:8.0-fpm

ENV WEB_PORT 9000

VOLUME /var/www/personal

WORKDIR /var/www/personal

RUN mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini" && \
    apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    libzip-dev \
    zip \
    jpegoptim \
    optipng \
    pngquant \
    gifsicle \
    libonig-dev \
    vim \
    unzip \
    git \
    curl && \
    apt-get clean && rm -rf /var/lib/apt/lists/* && \
    docker-php-ext-install pdo_mysql zip exif pcntl && \
    docker-php-ext-configure gd && \
    docker-php-ext-install gd && \
    curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

EXPOSE ${WEB_PORT}

CMD ["php-fpm"]
