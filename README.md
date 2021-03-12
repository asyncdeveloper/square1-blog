# Square1 blogging platform.

## Description
This project was built with Laravel

##### Integration testing :
- PHPUnit (https://phpunit.de)
- Faker (https://github.com/fzaninotto/Faker)

## Running the Application

### With Docker
To run the Application, you must install:
- **Docker** (https://www.docker.com/products/docker-desktop)

```
docker-compose up
```
Run setup script to migrate tables and seed data 

```
docker-compose exec app sh ./setup.sh
```
You should be able to visit your app at http://localhost:8080

### Without Docker
- **PHP** (https://www.php.net/downloads)
- **MySQL** (https://dev.mysql.com/downloads/installer)

Install Dependencies
```
composer install
```

Run setup script to migrate tables and seed data
```
chmod +x ./setup.sh
./setup.sh 
php artisan serve
```

You should be able to visit your app at http://localhost:8000

## Testing
To run integration tests:
```
 composer test
```
