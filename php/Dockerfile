FROM php:7.3-fpm-alpine
LABEL email="najmiddinov.nizom@gmail.com"
LABEL version="1.0"
LABEL description="This is a container php fpm with the most extensions used"
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && php -r "if (hash_file('sha384', 'composer-setup.php') === '906a84df04cea2aa72f40b5f787e49f22d4c2f19492ac310e8cba5b96ac8b64115ac402c8cd292b8a03482574915d1a8') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;" && php composer-setup.php --install-dir=/usr/local/bin --filename=composer && php -r "unlink('composer-setup.php');"
RUN apk add --update --no-cache --virtual .ext-deps \
        libjpeg-turbo-dev \
        libwebp-dev \
        libpng-dev \
        postgresql-dev \
        libzip-dev \
        freetype-dev \
        libmcrypt-dev \
        autoconf \
        g++ \
        make \
        openssl-dev \
        icu-dev
RUN \
    docker-php-ext-configure pdo_mysql && \
    docker-php-ext-configure pdo_pgsql && \
    docker-php-ext-configure zip --with-libzip && \
    docker-php-ext-configure opcache && \
    docker-php-ext-configure exif && \
    docker-php-ext-configure gd \
        --with-jpeg-dir=/usr/include \
        --with-png-dir=/usr/include \
        --with-webp-dir=/usr/include \
        --with-freetype-dir=/usr/include && \
    docker-php-ext-configure intl && \
    docker-php-ext-configure sockets && \
    docker-php-ext-configure bcmath && \
    docker-php-ext-install pdo_mysql pdo_pgsql zip opcache exif gd intl sockets bcmath

RUN pecl install redis && \
    pecl clear-cache && \
    docker-php-ext-enable redis && \
    docker-php-source delete
