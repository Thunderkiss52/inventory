git clone <твой_репозиторий>
cd inventory

composer install

cp .env.example .env

php artisan key:generate

touch storage/database.sqlite
chmod 664 storage/database.sqlite
php artisan migrate
php artisan db:seed --class=CategorySeeder

chmod -R 775 storage bootstrap/cache
