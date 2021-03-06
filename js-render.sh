#!/usr/bin/env bash
RED='\033[0;32m'
NC='\033[0m' # No Color
if [ "$1" != "prod" ]; then
 printf "${RED}> Development mode running...${NC}\n"
 npm run watch
else
 printf "${RED}> Production mode running...${NC}\n"
 npm run prod
 printf "${RED}> Production clear cache...${NC}\n"
 php artisan cache:clear
 printf "${RED}>>>>> DONE <<<<<${NC}\n"
fi

