#!/bin/bash

# Mulai proses PHP-FPM di background dengan path lengkap
/usr/sbin/php-fpm &

# Mulai Nginx di foreground dengan path lengkap
/usr/sbin/nginx -g 'daemon off;'
