#!/usr/bin/env bash

/usr/bin/php /var/www/html/artisan migrate --force
/usr/bin/php /var/www/html/artisan currency:manage add all
