# Menggunakan image PHP dengan FPM
FROM php:8.2-fpm

# Install dependencies
RUN --mount=type=cache,target=/var/cache/apt \
apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    unzip \
    git \
    curl \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd \
    && docker-php-ext-install pdo pdo_mysql

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# # Copy composer.json dan composer.lock terlebih dahulu
COPY --chown=www-data:www-data .  /var/www

# Install PHP dependencies via Composer
RUN composer update

# # Copy semua file ke working directory
# COPY --chown=www-data:www-data . /var/www

# Expose port PHP-FPM
EXPOSE 9000

# Menjalankan PHP-FPM
CMD ["php-fpm"]
