FROM php:8.2-cli

# Install dependencies
RUN apt-get update && apt-get install -y \
    libpq-dev git zip unzip \
    && docker-php-ext-install pdo pdo_pgsql

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

COPY . .

RUN composer install --no-dev --optimize-autoloader

EXPOSE 8000

CMD php -S 0.0.0.0:8000 -t public