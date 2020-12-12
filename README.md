docker-compose up -d --build

docker-compose exec app composer install

docker-compose exec app php artisan key:generate

docker-compose exec app chmod 777 -R storage/

docker-compose exec app php artisan config:clear

docker-compose exec app php artisan migrate