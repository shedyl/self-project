#!/usr/bin/env sh

#. .env
( \
  cd "${_SOURCE_ROOT}" \
  && php artisan migrate --seed
)
