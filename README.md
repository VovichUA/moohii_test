docker-compose up -d --build

docker-compose exec app composer install

copy .env.example to .env

docker-compose exec app php artisan key:generate

docker-compose exec app chmod 777 -R storage/

docker-compose exec app php artisan config:clear

docker-compose exec app php artisan migrate

docker-compose exec app php artisan db:seed