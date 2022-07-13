#!/usr/bin/env bash

php artisan cache:clear
php artisan view:clear
php artisan config:clear
php artisan queue:restart
php artisan route:clear
printf "${RED}> Ziggy route generating...${NC}\n"
php artisan ziggy:generate "resources/js/libraries/ziggy.js"
