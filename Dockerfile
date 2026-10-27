FROM php:8.2-fpm-alpine

# 1. Dependencias del sistema
RUN apk add --no-cache \
    nginx nodejs npm git curl libpng-dev \
    oniguruma-dev libxml2-dev zip unzip sqlite-dev

# 2. Extensiones PHP
RUN docker-php-ext-install pdo pdo_sqlite mbstring exif pcntl bcmath gd

# 3. Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# 4. Copiar proyecto
COPY --chown=www-data:www-data . .

# 5. Base de datos SQLite
RUN touch /var/www/html/database/database.sqlite && \
    chown -R www-data:www-data /var/www/html/database

# 6. Instalar dependencias PHP
RUN COMPOSER_PROCESS_TIMEOUT=900 COMPOSER_HTTP_TIMEOUT=900 composer install --no-dev --optimize-autoloader --prefer-dist --no-interaction

# 7. Compilar estilos (Vite)
RUN npm install && npm run build && rm -f public/hot

# 8. Permisos críticos para que Laravel y el servidor web lean los estilos
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/public
RUN chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/public

EXPOSE 8080

# 9. Iniciar: Limpiar caché, crear tablas CON seeders (--seed) y arrancar
# Usamos migrate:fresh --seed para asegurar que el reclutador siempre tenga el usuario admin
CMD php artisan optimize:clear && php artisan migrate:fresh --seed --force && php artisan serve --host=0.0.0.0 --port=8080