#!/bin/sh

# Ensure SQLite file exists
mkdir -p /var/www/database
touch /var/www/database/database.sqlite
chown -R www-data:www-data /var/www/database /var/www/storage /var/www/bootstrap/cache

# Run Laravel migrations and seeder
php artisan migrate:fresh --seed --force

# Start PHP-FPM in background
php-fpm -D

# Start Nginx in foreground
nginx -g "daemon off;"
