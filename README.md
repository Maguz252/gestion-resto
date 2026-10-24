# RestoGest — Sistema de gestión para restaurante

Aplicación web full-stack para gestionar productos, clientes, pedidos y métricas de un restaurante. Incluye autenticación con roles (admin/empleado), dashboard interactivo y exportación de tickets a PDF.

## 🚀 Funcionalidades
- **Autenticación y Roles:** Login con Laravel Breeze. Middleware para proteger rutas (Admin/Empleado).
- **Productos:** CRUD completo con búsqueda en vivo, paginación y control de stock.
- **Clientes:** CRUD completo con datos de contacto.
- **Pedidos:** Creación dinámica de pedidos con múltiples productos (Livewire), cálculo automático de totales y control transaccional de la base de datos.
- **Dashboard:** Métricas en tiempo real (Ventas del día, ventas del mes, pedidos atendidos y alertas de stock bajo).
- **Reportes:** Exportación de tickets de pedido en formato PDF (DomPDF).

## 🛠️ Stack Tecnológico
- **Backend:** Laravel 12
- **Frontend:** Livewire 3 + Alpine.js + Tailwind CSS
- **Base de Datos:** SQLite (Desarrollo)
- **Librerías extra:** Barryvdh/Laravel-DomPDF

## ⚙️ Instalación local
```bash
git clone https://github.com/Maguz252/gestion-resto.git
cd gestion-resto
composer install
cp .env.example .env
php artisan key:generate
touch database/database.sqlite
php artisan migrate --seed
npm install
npm run build
php artisan serve