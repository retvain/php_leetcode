FROM php:8.2-fpm

ARG HOST_UID

WORKDIR /usr/local/etc/php-fpm.d

USER root

# composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN chmod 777 -R /var/www

RUN apt update && apt upgrade -y && apt install wget -y

# clean
RUN apt-get clean && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*
WORKDIR /var/www

# xdebug
RUN pecl install xdebug-3.2.1 && docker-php-ext-enable xdebug

COPY xdebug.ini "${PHP_INI_DIR}/conf.d"

ADD php.ini /usr/local/etc/php/php.ini
COPY www.conf /usr/local/etc/php-fpm.d/www.conf

# certs
RUN mkdir -p /var/www/.composer
WORKDIR /var/www/.composer
RUN wget -O keys.dev.pub https://composer.github.io/snapshots.pub && \
    wget -O keys.tags.pub https://composer.github.io/releases.pub

WORKDIR /etc/ssl/certs
RUN wget -O cacert.pem https://curl.se/ca/cacert.pem

RUN chown -R www-data:www-data /var/www/.composer/

WORKDIR /var/www/php_leetcode

RUN usermod -u ${HOST_UID} www-data
USER www-data

EXPOSE 9000
