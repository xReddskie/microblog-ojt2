BASE_DIR := $(shell pwd)

build:
	docker-compose build --no-cache 
	docker-compose up -d

permissions:
	sudo chmod -R 777 $(BASE_DIR)/src
	docker-compose exec php chmod -R 777 /var/www/html
	docker-compose exec php chmod -R 777 /var/www/html/storage/logs
	docker-compose exec php chown -R www-data:www-data /var/www/html/storage/logs

migrate:
	docker-compose exec php php /var/www/html/artisan migrate

vendor:
	docker-compose exec -w /var/www/html php composer install

backend:
	docker exec -it microblogteam2-php-1 /bin/bash
	cd html

optimize:
	docker-compose exec php php /var/www/html/artisan optimize:clear

up:
	docker-compose up -d

down:
	docker-compose down

down-build:
	docker-compose down && docker-compose up -d --build

refresh:
	docker-compose down && docker-compose up -d
