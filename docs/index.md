#### Kerson Company - PHP Backend Junior Programmer Challenge (Laravel)

- This application is a Laravel backend API that implements a CRUD with the following *endpoints*:

| Endpoint              | Method |
|-----------------------|:------:|
| /ping                 |  POST  |
| /auth                 |  POST  |
| /users                |  POST  |
| /users/{id}           |  PUT   |
| /users/{id}           | DELETE |
| /users/{id}           |  GET   |
| /users                |  GET   |
| /logout               |  POST  |

### How to install 
##### Method 1 (Automated) 

```./install.sh```

##### Method 2 (step by step)
   
- Access the terminal
- Download the repository:
  
```git clone https://github.com/tfilho/backend-php-junior```
- Install the dependencies:

```composer install```
- Copy the model settings file:
  
```cp .env.example .env```

- Access the .env file and change the following variables (Put your settings):

```
DB_HOST = 127.0.0.1
DB_PORT = 3306
DB_DATABASE = laravel
DB_USERNAME = root
DB_PASSWORD = secret
```

- Create the application key:

```php artisan key:generate```

- Create the JWT key:

```php artisan jwt:secret```

- Create the database structure
 
```php artisan migrate```

- Add some random users:

```php artisan db:seed```

- Run the embedded development server:

``` php artisan serve```

That done, the api is available for use.
By default, the url is *** http: //127.0.0.1: 8000 / api ***

#### Testing with Insomnia / Postman

- To perform the tests, import the ./tests/Insomnia_back-php-junior.json file
