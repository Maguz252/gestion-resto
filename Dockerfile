FROM php:8.2-fpm-alpine

# 1. Instalar dependencias del sistema
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

# 2. Instalar extensiones de PHP
RUN docker-php-ext-install pdo pdo_sqlite mbstring exif pcntl bcmath gd

# 3. Copiar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 4. Configurar directorio de trabajo
WORKDIR /var/www/html

# 5. Copiar el proyecto
COPY . .

# 6. Crear la base de datos SQLite y darle permisos
RUN touch /var/www/html/database/database.sqlite
RUN chown -R www-data:www-data /var/www/html/database

# 7. Instalar dependencias de PHP (Aumentando timeout por si la red de Render falla)
RUN composer config -g http.timeout 600
RUN composer install --no-dev --optimize-autoloader

# 8. Instalar dependencias de Node y compilar Tailwind
RUN npm install && npm run build

# 9. Limpiar caché para que tome las variables de entorno de Render
RUN php artisan optimize:clear

# 10. Configurar permisos de almacenamiento
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

EXPOSE 8080

# 11. Iniciar la app
CMD php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=8080