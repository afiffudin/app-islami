# Gunakan image PHP yang sesuai (misalnya PHP 8.1)
FROM php:8.2

# Set lingkungan kerja
WORKDIR /app

# Salin semua file ke direktori kerja
COPY . /app

# Salin file composer.lock dan composer.json ke direktori kerja
# COPY composer.lock composer.json /app/

# Instal dependensi sistem yang diperlukan
RUN apt-get update && apt-get install -y \
    libzip-dev \
    unzip \
    && docker-php-ext-install zip

# Instal Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Jalankan composer install
RUN composer install


# Set izin yang sesuai untuk direktori
RUN chown -R www-data:www-data /app

# Jalankan aplikasi
CMD php artisan serve --host=0.0.0.0 --port=8080
# CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8080"]
EXPOSE 8080

