FROM composer:1.8.6

RUN apk update
RUN apk add zlib-dev gd php7-gd
RUN apk add --no-cache libpng libpng-dev && docker-php-ext-install gd
