FROM php:7.2-apache

RUN pecl install xdebug-2.8.1
RUN docker-php-ext-enable xdebug

RUN docker-php-ext-install mysqli
RUN docker-php-ext-enable mysqli