#!/usr/bin/env bash

# Start Nginx service
service nginx start

php artisan optimize:clear
php artisan optimize
php artisan storage:link

# Run Laravel migrations
php artisan migrate --seed --force

# Create symbolic link for storage

# Clear and optimize the application cache

# Migration
# php artisan migrate:fresh --seed

# Start PHP-FPM
php-fpm