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
    nginx \
    git \
    curl \
    postgresql-dev \
    libpq

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_pgsql

# Install composer
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

# Copy app
COPY . .

# Copy compiled assets
COPY --from=assets /build/public/build ./public/build

# Install PHP deps
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Cache Laravel config
RUN php artisan config:clear && \
    php artisan config:cache && \
    php artisan route:cache && \
    php artisan view:cache

# Permissions
RUN mkdir -p storage bootstrap/cache && \
    chmod -R 775 storage bootstrap/cache && \
    chown -R www-data:www-data storage bootstrap/cache public

# Copy Nginx config
COPY docker/nginx.conf /etc/nginx/http.d/default.conf

EXPOSE 10000

CMD ["sh", "-c", "php-fpm -D && nginx -g 'daemon off;'"]
