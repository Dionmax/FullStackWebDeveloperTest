#docker/php

FROM php:8.2-fpm-buster

RUN apt-get clean

RUN apt-get update

RUN apt-get install -y \
    gnupg \
    g++ \
    procps \
    openssl \
    git \
    unzip \
    zlib1g-dev \
    libzip-dev \
    libfreetype6-dev \
    libpng-dev \
    libjpeg-dev \
    libicu-dev  \
    libonig-dev \
    libxslt1-dev \
    acl \
    && echo 'alias sf="php bin/console"' >> ~/.bashrc

RUN docker-php-ext-configure gd --with-jpeg --with-freetype 

RUN apt-get install -y zlib1g-dev libpq-dev git libicu-dev libxml2-dev libzip-dev zip \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install pdo pdo_pgsql pgsql \
    && docker-php-ext-install zip xml

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN composer self-update

WORKDIR /var/www/symfony