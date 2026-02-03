#!/bin/bash
set -e

php artisan optimize:clear

php artisan storage:link || true
php artisan migrate --force

php artisan config:cache
php artisan route:cache
php artisan view:cache
