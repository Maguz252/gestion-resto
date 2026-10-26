FROM php:8.2-fpm-alpine

RUN apk add --no-cache \
    nginx nodejs npm git curl libpng-dev \
    oniguruma-dev libxml2-dev zip unzip sqlite-dev

RUN docker-php-ext-install pdo pdo_sqlite mbstring exif pcntl bcmath gd

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY --chown=www-data:www-data . .

# Crear la base de datos SQLite
RUN touch /var/www/html/database/database.sqlite && \
    chown -R www-data:www-data /var/www/html/database

# Instalar dependencias de PHP
RUN COMPOSER_PROCESS_TIMEOUT=900 COMPOSER_HTTP_TIMEOUT=900 composer install --no-dev --optimize-autoloader --prefer-dist --no-interaction

# Compilar Vite (borrando el archivo 'hot' si existe)
RUN if [ -f package.json ]; then \
    NODE_OPTIONS="--max-old-space-size=460" npm install && \
    NODE_OPTIONS="--max-old-space-size=460" npm run build && \
    rm -f public/hot; \
    fi

# Dar permisos a las carpetas necesarias
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/public

EXPOSE 8080

# ACÁ ESTÁ LA MAGIA: Limpiamos la caché AL INICIAR, no al construir.
# Y ejecutamos las migraciones.
CMD php artisan optimize:clear && php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=8080