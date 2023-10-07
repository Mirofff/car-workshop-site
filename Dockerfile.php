FROM php:fpm-bullseye
RUN docker-php-ext-install pdo pdo_mysql
RUN docker-php-ext-enable pdo pdo_mysql
RUN pecl install xdebug
RUN docker-php-ext-enable xdebug