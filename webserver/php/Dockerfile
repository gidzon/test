FROM php:7.3-apache

RUN docker-php-ext-install -j$(nproc) mysqli

RUN docker-php-ext-install -j$(nproc) pdo_mysql

RUN pecl install xdebug-2.9.8 && docker-php-ext-enable xdebug

RUN a2enmod rewrite