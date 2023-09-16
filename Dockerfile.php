FROM php:fpm-bullseye
RUN docker-php-ext-install pdo pdo_mysql
RUN docker-php-ext-enable pdo pdo_mysql
# install xdebug
RUN pecl install xdebug

# copy over the config files
COPY ./xdebug.ini /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
COPY ./error_reporting.ini /usr/local/etc/php/conf.d/error_reporting.ini

# enable the extension
RUN docker-php-ext-enable xdebug