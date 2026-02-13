FROM php:8.2-apache

# Install mysqli extension for MySQL connectivity
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# Enable Apache mod_rewrite (useful for future routing)
RUN a2enmod rewrite

# Set working directory
WORKDIR /var/www/html

# Copy all project files into the container
COPY . .

# Make entrypoint script executable
RUN chmod +x /var/www/html/docker/entrypoint.sh

# Expose port 80
EXPOSE 80

# Use custom entrypoint to patch config at runtime
ENTRYPOINT ["/var/www/html/docker/entrypoint.sh"]
