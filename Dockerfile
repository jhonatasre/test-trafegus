FROM php:8.3-apache

LABEL maintainer="getlaminas.org" \
    org.label-schema.docker.dockerfile="/Dockerfile" \
    org.label-schema.name="Laminas MVC Skeleton" \
    org.label-schema.url="https://docs.getlaminas.org/mvc/" \
    org.label-schema.vcs-url="https://github.com/laminas/laminas-mvc-skeleton"

RUN apt-get update

RUN a2enmod rewrite \
    && sed -i 's!/var/www/html!/var/www/public!g' /etc/apache2/sites-available/000-default.conf \
    && mv /var/www/html /var/www/public

RUN curl -sS https://getcomposer.org/installer \
    | php -- --install-dir=/usr/local/bin --filename=composer

RUN apt-get install --yes git zlib1g-dev libzip-dev \
    && docker-php-ext-install zip

RUN apt-get install --yes libicu-dev \
    && docker-php-ext-configure intl \
    && docker-php-ext-install intl

RUN docker-php-ext-install pdo_mysql

WORKDIR /var/www
