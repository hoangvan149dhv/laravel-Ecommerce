#!/usr/bin/env bash

php artisan cache:clear
php artisan view:clear
php artisan config:clear
php artisan queue:restart

