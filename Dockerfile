FROM php:8.1-apache

# Install MySQL extensions
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Copy application files
COPY src/ /var/www/html/

# Set working directory
WORKDIR /var/www/html

# Expose port
EXPOSE 80
