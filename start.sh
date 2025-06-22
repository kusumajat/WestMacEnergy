#!/bin/bash

# Mulai proses PHP-FPM di background
php-fpm &

# Mulai Nginx di foreground
# Perintah -g 'daemon off;' membuat Nginx tidak lari ke background
# yang akan menjaga container tetap hidup.
nginx -g 'daemon off;'
