# Simple Blog written in Laravel

Tools used:

1. [Laravel](https://laravel.com/)
2. [Backpack for Laravel](backpackforlaravel.com)
3. [Docker build by FromSI](https://github.com/btn441/docker-npmc)

To run a project:

1. **make run** -> Installs docker images
2. Type **make php** and **composer install** to install composer dependencies
3. Run **npm install** to install js dependencies
4. Admin dashboard is located at localhost/admin
5. Run **php artisan migrate:fresh --seed** it will generate db with fake data and user with admin role

Admin login: **admin@test.com**
Admin password: **admin12345**
