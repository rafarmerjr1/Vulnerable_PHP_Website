FROM php:7.4-apache
RUN apt-get update -y
RUN docker-php-ext-install mysqli
COPY php.ini /usr/local/etc/php/

#USER root
#CMD chmod 755 -R /var/www/html/resources
