FROM composer:2 AS composer
FROM php:8.2-fpm

USER root
COPY --from=composer /usr/bin/composer /usr/bin/composer

ENV COMPOSER_MEMORY_LIMIT=-1

RUN apt-get update \
    && apt-get install -y \
        autoconf \
        git \
        zip \
        unzip \
        libpq-dev \
        libzip-dev \
        zlib1g-dev \
        libssl-dev \
        net-tools \
    && useradd -m jefffrade

RUN rm /etc/ssl/openssl.cnf

RUN docker-php-ext-install \
        pdo \
        bcmath \
        pdo_mysql \
        zip

WORKDIR /projeto

RUN chown -R jefffrade:jefffrade /projeto
USER jefffrade
