# Use the official PHP image with Apache as the base image
FROM php:apache

RUN docker-php-ext-install pdo_mysql

# Set the working directory inside the container
WORKDIR /var/www/html

# Copy PHP files to the working directory in the container
COPY . .

# Expose port 80 for the web server
EXPOSE 80
