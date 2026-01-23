FROM php:8.2-apache

# Enable mysqli and PDO extensions
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Copy all project files into Apache's web root
COPY . /var/www/html/

# Enable Apache rewrite module (optional)
RUN a2enmod rewrite
