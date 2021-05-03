ARG PHP_VERSION

FROM php:${PHP_VERSION}-alpine

RUN apk update && apk add bash

RUN set -ex \
  && apk --no-cache add postgresql-dev

RUN docker-php-ext-install pdo pdo_pgsql json

COPY etc /etc

WORKDIR /application

ENTRYPOINT ["/etc/wait-for-it.sh", "postgres:5432", "--", "/etc/entrypoint.sh"]
