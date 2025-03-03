# Käytä PHP 8.2 FPM -kuvaa
FROM php:8.2-fpm

# Määritä työskentelyhakemisto
WORKDIR /app

# Päivitä paketit ja asenna tarvittavat PHP-laajennukset
RUN apt-get update && apt-get install -y \
    libpq-dev libzip-dev zip unzip git curl \
    && docker-php-ext-install pdo pdo_mysql

# Kopioi Laravel-projektin tiedostot
COPY . /app

# Asenna Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Suorita Composer-paketit
RUN composer install --no-dev --optimize-autoloader

# Anna käyttöoikeudet Laravelin hakemistoille
RUN chmod -R 775 /app/storage /app/bootstrap/cache

# Käynnistä PHP-FPM
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]


