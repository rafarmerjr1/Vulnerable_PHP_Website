FROM php:7.4-apache
RUN apt-get update -y
RUN docker-php-ext-install mysqli
COPY php.ini /usr/local/etc/php/
RUN true
COPY --chown=www-data:www-data . /var/www/html
