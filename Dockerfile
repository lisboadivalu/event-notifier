FROM php:8.1-fpm

WORKDIR /var/www

COPY composer.lock composer.json /var/www/

COPY .env .

USER root

RUN apt-get update && apt-get install -y \
    zip \
    nano \
    vim \
    unzip \
    git \
    curl

RUN apt-get clean && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install pdo_mysql

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY . /var/www

COPY --chown=www:www . /var/www

USER www

CMD ["php-fpm"]
