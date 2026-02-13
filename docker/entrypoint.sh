#!/bin/bash
set -e

# Patch config.php INSIDE the container only — replace localhost with the db service hostname
sed -i 's/$host = "localhost";/$host = "db";/' /var/www/html/config.php

# Start Apache in the foreground
exec apache2-foreground
