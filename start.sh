#!/bin/bash

chown -R nginx:nginx /var/www/case
chmod 777 -R /var/www/case/app/storage

/usr/bin/supervisord -n -c /etc/supervisord.conf