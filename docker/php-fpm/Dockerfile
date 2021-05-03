ARG PHP_VERSION

FROM surnet/alpine-wkhtmltopdf:3.10-0.12.5-full as wkhtmltopdf
FROM php:${PHP_VERSION}-fpm-alpine

RUN apk add --no-cache \
        $PHPIZE_DEPS \
        postgresql-dev \
        zip \
        libzip-dev \
        libstdc++ \
        libx11 \
        libxrender \
        libxext \
        libssl1.1 \
        ca-certificates \
        fontconfig \
        freetype \
        ttf-dejavu \
        ttf-droid \
        ttf-freefont \
        ttf-liberation \
        ttf-ubuntu-font-family \
        libmemcached-libs zlib \
        && apk add --no-cache --virtual .phpize-deps $PHPIZE_DEPS \
        && apk add --no-cache --virtual .memcached-deps zlib-dev libmemcached-dev cyrus-sasl-dev \
        && apk add --no-cache --virtual .build-deps msttcorefonts-installer \
        && update-ms-fonts \
        && fc-cache -f \
        && rm -rf /tmp/* \
        && apk del .build-deps \
        && pecl install memcached \
        && echo "extension=memcached.so" > /usr/local/etc/php/conf.d/20_memcached.ini

RUN pecl install xdebug-2.9.8
RUN docker-php-ext-install pdo pdo_pgsql json zip
RUN docker-php-ext-enable xdebug

CMD ["php-fpm"]
