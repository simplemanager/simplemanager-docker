FROM php:7.2-fpm-alpine3.7

MAINTAINER Guillaume Ponçon <guillaume.poncon@openstates.com>

ENV LC_ALL=fr_FR.UTF-8 \
    LANG=fr_FR.UTF-8 \
    LANGUAGE=fr_FR.UTF-8 \
    SMA_BRANCH=0.1 \
    SMA_URL=https://github.com/simplemanager/simplemanager

RUN apk add --no-cache --virtual .persistent-deps inkscape mysql-client bash

RUN apk add --no-cache --virtual .libs-deps gettext-dev freetype-dev libpng-dev libjpeg-turbo-dev libxml2-dev icu-dev yaml-dev zlib-dev gmp-dev imagemagick-dev

RUN apk add --update --virtual .build-deps autoconf g++ libtool make curl nodejs-npm git \
    && docker-php-ext-configure gd \
        --with-gd \
        --with-freetype-dir=/usr/include/ \
        --with-png-dir=/usr/include/ \
        --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install gd gmp mysqli opcache intl zip gettext \
    && pecl install imagick yaml redis \
    && docker-php-ext-enable imagick yaml redis

RUN apk add --no-cache --virtual .imagick-runtime-deps imagemagick

RUN curl -s https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer

RUN mkdir -m 0750 -p /opt \
    && chown www-data:www-data /opt

USER www-data

WORKDIR /opt

# RUN php -m && composer --version && pwd

RUN git clone -b ${SMA_BRANCH} --depth 1  ${SMA_URL}

WORKDIR /opt/simplemanager

RUN composer update --prefer-stable

WORKDIR /opt/simplemanager/frontend/admin

RUN npm install && sh ./build.sh 

WORKDIR /opt/simplemanager

RUN git pull \
    && composer update \
    && sh ./vendor/osflab/osf/src/Pdf/update-fonts

COPY files/application.php etc/application.php

USER root

COPY files/php.ini /usr/local/etc/php/

RUN apk add --no-cache --repository http://dl-3.alpinelinux.org/alpine/edge/testing gnu-libiconv

ENV LD_PRELOAD /usr/lib/preloadable_libiconv.so php

RUN ln -s /opt/simplemanager/bin/sma /usr/bin/sma \
    && ln -s /opt/simplemanager/bin/clean.sh /usr/local/bin/sma-clean

#RUN apk del --purge -r .build-deps \
#    && rm -rf /tmp/* /var/cache/apk/*

EXPOSE 9000

CMD ["php-fpm"]

