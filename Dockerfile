FROM php:8.2-fpm-alpine


RUN apk add --no-cache \
    nginx \
    nodejs \
    npm \
    git \
    curl \
    libpng-dev \
    oniguruma-dev \
    libxml2-dev \
    zip \
    unzip \
    sqlite-dev


RUN docker-php-ext-install pdo pdo_sqlite mbstring exif pcntl bcmath gd


COPY --from=composer:latest /usr/bin/composer /usr/bin/composer


WORKDIR /var/www/html


COPY . .


RUN composer install --no-dev --optimize-autoloader


RUN npm install && npm run build


RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

EXPOSE 8080


CMD php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=8080
# Crear la base de datos SQLite y darle permisos
RUN touch /var/www/html/database/database.sqlite
RUN chown -R www-data:www-data /var/www/html/database
# Limpiar caché para que tome las variables de entorno de Render
RUN php artisan optimize:clear