# Use the official PHP image with Apache as the base image
FROM php:apache

# Install the MySQLi extension for PHP
RUN docker-php-ext-install mysqli

# Set the working directory inside the container
WORKDIR /var/www/html

# Copy PHP files to the working directory in the container
COPY . .

# Expose port 80 for the web server
EXPOSE 80
