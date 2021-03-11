#!/bin/sh

cp .env.example .env
# Install/update composer dependecies
composer install --no-interaction --prefer-dist --optimize-autoloader

php artisan key:generate

# Run database migrations
php artisan migrate:fresh --force --seed

php artisan optimize
