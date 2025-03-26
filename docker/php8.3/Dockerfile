FROM php:8.3-fpm

RUN apt-get update \
        && apt-get install -y openssh-client \
		&& apt-get install -y \
        unzip \
        zip \
        libzip-dev \
        curl \
        git \
        wget

RUN docker-php-ext-install pdo && \
    docker-php-ext-install pdo_mysql

RUN docker-php-ext-configure zip && \
    docker-php-ext-install zip

RUN docker-php-ext-install pcntl && \
    docker-php-ext-configure pcntl --enable-pcntl

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer
RUN composer global require laravel/installer
RUN export PATH="~/.composer/vendor/bin:$PATH"

WORKDIR /var/skillaAPI
ADD ./ /var/skillaAPI

RUN composer global require laravel/installer
RUN composer install
