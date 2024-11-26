#!/bin/bash
git pull
composer install --no-dev --optimize-autoloader
npm ci
npm run build
