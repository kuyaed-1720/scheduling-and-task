<<<<<<< HEAD
=======
name: Deploy Laravel Application

on:
  push:
    branches:
      - main

jobs:
  deploy:
    runs-on: windows-latest

    steps:
      - name: Checkout code
        uses: actions/checkout@v2

      - name: Set up PHP
        uses: shivammathur/setup-php@v2
        with:
          php-version: '8.0'

      - name: Install dependencies
        run: composer install --no-interaction --prefer-dist --optimize-autoloader

      - name: Run deployment script
        run: ./scripts/deploy.bat
>>>>>>> bd3319e03361900bbe6f6eb73e2fdc33ffa6d20e
