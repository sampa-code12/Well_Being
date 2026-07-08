FROM php:8.2-cli

ENV DEBIAN_FRONTEND=noninteractive \
    COMPOSER_ALLOW_SUPERUSER=1 \
    APP_ENV=production \
    APP_DEBUG=false \
    PORT=8000

RUN apt-get update && apt-get install -y --no-install-recommends \
    git \
    curl \
    unzip \
    libicu-dev \
    libonig-dev \
    libzip-dev \
    zip \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libxml2-dev \
    libcurl4-openssl-dev \
    libpq-dev \
    ca-certificates \
    gnupg \
    && curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo_mysql pdo_pgsql pdo_sqlite mbstring exif pcntl bcmath gd zip intl opcache \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

WORKDIR /var/www/html

COPY composer.json composer.lock* ./
COPY package.json package-lock.json* ./
COPY . .

RUN composer install --no-interaction --prefer-dist --no-dev --optimize-autoloader \
    && npm install \
    && npm run build

RUN if [ -f .env.example ]; then cp .env.example .env; fi \
    && php artisan key:generate --force \
    && chmod -R 775 storage bootstrap/cache \
    && php artisan config:cache \
    && php artisan route:cache \
    && php artisan view:cache \
    && php artisan storage:link || true

EXPOSE 8000

CMD ["sh", "-c", "php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=${PORT}"]
