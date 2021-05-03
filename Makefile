UID := $(shell id -u)
GID := $(shell id -g)

install:
	export _UID="${UID}" \
    		&& export _GID="${GID}" \
    		&& time docker-compose run --rm --no-deps --user="${UID}:${GID}" composer \
    		&& time docker-compose run --rm --user="${UID}:${GID}" migrations_and_seeders

start:
	export _UID="${UID}" \
		&& export _GID="${GID}" \
		&& time docker-compose run --rm --no-deps --user="${UID}:${GID}" composer \
		&& time docker-compose run --rm --user="${UID}:${GID}" migrations_and_seeders

dev: start

stop:
	docker-compose stop

down:
	docker-compose down

migrate:
	docker-compose exec php-fpm php artisan migrate

migrate-rollback:
	docker-compose exec php-fpm php artisan migrate:rollback

codesniffer:
	docker-compose exec php-fpm ./vendor/bin/phpcs --standard=./phpcs.xml ./app

phpmd:
	docker-compose exec php-fpm ./vendor/bin/phpmd app/ text codesize,unusedcode,./phpmd.xml

psalm:
	docker-compose exec php-fpm ./vendor/bin/psalm --show-info=true

lint: codesniffer phpmd psalm

models-phpdoc:
	docker-compose exec php-fpm php artisan ide-helper:models --reset --write