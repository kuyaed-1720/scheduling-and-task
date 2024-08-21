@echo off
REM Navigate to the project directory
cd /d C:\path\to\your\laravel\project

REM Pull the latest changes from GitHub
git pull origin main

REM Install/update composer dependencies
composer install --no-interaction --prefer-dist --optimize-autoloader

REM Run database migrations
php artisan migrate --force

REM Seed the database
php artisan db:seed --force

REM Clear and cache configurations
php artisan config:cache
php artisan route:cache
php artisan view:cache
