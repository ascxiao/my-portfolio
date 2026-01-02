#!/bin/sh

# Stop the script if any command fails
set -e

echo "Running composer"
composer install --no-dev --working-dir=/var/www/html

echo "Caching config..."
php artisan config:cache

echo "Caching routes..."
php artisan route:cache

echo "Running migrations..."
php artisan migrate --force

echo "Starting Supervisor..."
# This is crucial! It executes the command passed from the Dockerfile CMD
# (which is: /usr/bin/supervisord -c /etc/supervisor/conf.d/supervisord.conf)
exec "$@"