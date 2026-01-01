FROM node:20-alpine as assets

WORKDIR /build
COPY package*.json ./
RUN npm ci
COPY . .
RUN npm run build

FROM php:8.2-fpm-alpine

WORKDIR /var/www/html

# Install system dependencies
RUN apk add --no-cache \
    git \
    curl \
    postgresql-dev \
    libpq

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_pgsql

# Install composer
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

# Copy application
COPY . .

# Copy compiled assets from Node build
COPY --from=assets /build/public/build ./public/build

# Install PHP dependencies (production only)
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Cache configuration
RUN php artisan config:cache && \
    php artisan route:cache && \
    php artisan view:cache

# Create storage directories and set permissions
RUN mkdir -p storage/logs && \
    mkdir -p storage/framework/cache && \
    mkdir -p storage/framework/sessions && \
    mkdir -p storage/framework/views && \
    mkdir -p bootstrap/cache && \
    chmod -R 755 storage bootstrap/cache && \
    chown -R www-data:www-data storage bootstrap/cache public

# Expose port
EXPOSE 8000

# Run migrations and start server
RUN php artisan db:seed --force
CMD php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=8000

