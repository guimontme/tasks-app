FROM php:7.4-apache
# FROM toasterlint/php-apache-mysql:7.4-nowarn

# LABEL maintener="Gui Mont"

WORKDIR /var/www/html

# Start Apache
RUN /etc/init.d/apache2 start

# Install Git
RUN apt-get update && \
    apt-get upgrade -y && \
    apt-get install -y unzip && \
    apt-get install -y git && \
    docker-php-ext-install pdo_mysql

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
# RUN composer self-update 1.10.22

EXPOSE 80
