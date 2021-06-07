FROM php:8.0-cli

VOLUME /var/www/personal

COPY php.ini $PHP_INI_DIR/php.ini

RUN apt-get update && apt-get install -y \
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
    vim \
    unzip \
    git \
    curl \
    mariadb-client \
    npm && \
    apt-get clean && rm -rf /var/lib/apt/lists/* && \
    docker-php-ext-install pdo_mysql mbstring zip exif pcntl && \
    docker-php-ext-configure gd --with-gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ --with-png-dir=/usr/include/ && \
    docker-php-ext-install gd && \
    curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer && \
    npm install -g yarn && \
    yarn global add n && \
    n latest
    
CMD git clone https://github.com/commnerd/Personal.git /app && \
    cd /app && \
    /usr/local/bin/composer install && \
    yarn && \
    yarn prod && \
    cp /var/www/personal/.env /app/.env && \
    cp -fR /var/www/personal/storage /app/storage && \
    cd /var/www/personal && \
    php artisan backup:run && \
    cd /app && \
    php artisan storage:link && \
    php artisan canvas:publish && \
    php artisan down && \
    mv /var/www/personal/* /tmp && \
    mv /app/* /var/www/personal && \
    rm -fR /tmp/* && \
    php artisan up
