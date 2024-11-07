# Dockerfile for PHP 8.3 with Symfony support

FROM php:8.3-fpm

# Install dependencies
RUN apt-get update && apt-get install -y \
    libicu-dev \
    libzip-dev \
    unzip \
    git \
    && docker-php-ext-install intl pdo pdo_mysql zip \
    && docker-php-ext-enable intl

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Expose port for PHP-FPM
EXPOSE 9000
