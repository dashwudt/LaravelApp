#!/bin/bash
set -e
# Change directory ownership at runtime
chown -R laraveluser:laravelgroup /var/www
chmod -R 775 /var/www/storage
chmod -R 775 /var/www/bootstrap/cache
# Then execute the passed in command
exec "$@"
