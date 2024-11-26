#!/bin/bash
set -e
php artisan down
git pull
composer install --no-dev --optimize-autoloader
npm ci
npm run build
php artisan migrate --force
php artisan up
