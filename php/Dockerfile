FROM php:7.4-fpm

RUN apt-get update
RUN apt-get install -y git wget libpng-dev libicu-dev libcurl4-openssl-dev libzip-dev gnupg2

RUN apt-get clean && rm -rf /var/lib/apt/lists

RUN docker-php-ext-configure intl
RUN docker-php-ext-install pdo pdo_mysql gd bcmath intl curl zip

RUN wget https://getcomposer.org/download/latest-2.x/composer.phar
RUN chmod +x composer.phar
RUN mv composer.phar /usr/local/bin/composer
