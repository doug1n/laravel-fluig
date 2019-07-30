FROM php:7.3-fpm-alpine

WORKDIR /var/www/

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer