#!/bin/sh
cd /var/www
php artisan migrate
php artisan storage:link
chmod -R 775 /var/www/storage
chmod -R 775 /var/www/public/storage
chown -R www-data:www-data /var/www/storage
chown -R www-data:www-data /var/www/public/storage

supervisord -c /etc/supervisord.conf