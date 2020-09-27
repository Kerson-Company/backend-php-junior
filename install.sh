#!/bin/bash

# Laravel installation script

message () {
  echo -e "\033[0;32m$1\033[0m"
}

message "Downloading files..."
cd backend-php-junior

message "Installing composer"
composer install

message "Create environment"
cp .env.example .env

message "Environment settings"

message "Type the DB_HOST:"
message "Example: 127.0.0.1"
read -r -p "" host
sed -i "/DB_HOST=.*/c\DB_HOST=\"$host\"" .env

message "Type the DB_PORT:"
message "Example: 3306"
read -r -p "" port
sed -i "/DB_PORT=.*/c\DB_PORT=\"$port\"" .env

message ""
message "TIP: Make sure your database is already created!!!"
message ""

message "Type the DB_DATABASE:"
message "Example: laravel"
read -r -p "" db
sed -i "/DB_DATABASE=.*/c\DB_DATABASE=\"$db\"" .env

message "Type the DB_USERNAME:"
message "Example: root"
read -r -p "" user
sed -i "/DB_USERNAME=.*/c\DB_USERNAME=\"$user\"" .env

message "Type the DB_PASSWORD:"
message "Example: secret"
read -r -p "" pass
sed -i "/DB_PASSWORD=.*/c\DB_PASSWORD=\"$pass\"" .env


message " Creating a security key for the application"
php artisan key:generate

message " Creating a JWT key"
php artisan jwt:secret

message "Running Migrations"
php artisan migrate:fresh

message "Running Seeders"
php artisan db:seed

message ""
message "Auth data:"
message "email: test@example.com"
message "password: password"
message ""

message "Starting local application service..."
php artisan serve


