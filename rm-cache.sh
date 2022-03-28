#!/usr/bin/env bash

read_var() {
    VAR=$(grep $1 $2 | xargs)
    IFS="=" read -ra VAR <<< "$VAR"
    echo ${VAR[1]}
}

APP_URL=$(read_var APP_URL .env)/
WEB_DIR=$(pwd)/public/

RANDOM_NAME=$(head /dev/urandom | tr -dc A-Za-z0-9 | head -c 13)
echo "<?php opcache_reset(); echo 'Cleared opcache nginx!'.PHP_EOL; ?>" > ${WEB_DIR}${RANDOM_NAME}.php
php artisan cache:clear
php artisan view:clear
php artisan config:clear
php artisan route:cache
php artisan queue:restart
curl ${APP_URL}${RANDOM_NAME}.php
rm ${WEB_DIR}${RANDOM_NAME}.php

