# Inventory

Это тестовое приложение на Laravel для управления товарами и заказами.

## Установка

1. Склонируйте репозиторий:
   ```bash
   git clone https://github.com/thunderkiss52/inventory.git
   cd inventory
   ```

composer install

cp .env.example .env

php artisan key:generate

touch storage/database.sqlite
chmod 664 storage/database.sqlite
php artisan migrate
php artisan db:seed --class=CategorySeeder

chmod -R 775 storage bootstrap/cache
