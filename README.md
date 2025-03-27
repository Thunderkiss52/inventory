# Inventory

Это тестовое приложение на Laravel для управления товарами и заказами.

## Prerequisites

- **PHP 8.1**
- **SQLite 3+**


## Установка

1. Склонируйте репозиторий:
   ```bash
   git clone git@github.com:thunderkiss52/inventory.git
   cd inventory
   ```
   
2. Установите зависимости:
```bash
composer install
cp .env.example .env
php artisan key:generate
```

3. Создайте БД:
```bash
touch storage/database.sqlite
chmod 664 storage/database.sqlite
```

4. Наполните БД:
```bash
php artisan migrate
php artisan db:seed --class=CategorySeeder
```

5. Запустите проект:
```bash
php artisan serve
```
6. Откройте проект в браузере по адресу:
```bash
http://127.0.0.1/
```
