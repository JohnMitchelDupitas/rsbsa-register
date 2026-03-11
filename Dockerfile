FROM php:8.2-cli

WORKDIR /app

# 1. Install PHP extensions and system dependencies
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    libpng-dev \
    curl \
    libpq-dev \
    nodejs npm \
    && docker-php-ext-install pdo pdo_pgsql zip

# 2. Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 3. Prevent Composer from running out of memory on Render
ENV COMPOSER_MEMORY_LIMIT=-1

# 4. Copy ONLY composer files first (Crucial for Docker caching)
COPY composer.json composer.lock ./

# 5. Install dependencies BEFORE copying the rest of the code
RUN composer install --no-dev --optimize-autoloader --no-scripts

# 6. Now copy the rest of your Laravel project files
COPY . .

# 7. Install frontend dependencies and build assets
RUN npm install
RUN npm run build

EXPOSE 10000

# Startup: wait a few seconds, run migrations, then serve
CMD sleep 5 && php artisan migrate --force && php -S 0.0.0.0:10000 -t public
