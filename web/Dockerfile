FROM php:7.4-apache

# Set the working directory
WORKDIR /var/www/html

# Install mysqli extension
RUN docker-php-ext-install mysqli

# Copy the GnuBoard files to the container
COPY . /var/www/html

# Set the permissions for the /web/data directory
RUN chmod 707 /var/www/html/data

# Expose port 80 for the web server
EXPOSE 80

# Start Apache web server
CMD ["apache2-foreground"]