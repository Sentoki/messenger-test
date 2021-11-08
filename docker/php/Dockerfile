FROM php:8.0-fpm

RUN apt-get update && \
    apt-get upgrade -y && \
    apt-get install -y git

RUN pecl install xdebug-3.1.1 \
    && docker-php-ext-enable xdebug

COPY xdebug.ini /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /app