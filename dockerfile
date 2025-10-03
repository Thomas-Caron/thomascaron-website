FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
    libzip-dev \
    libpq-dev \
    libicu-dev \
    unzip \
    git && \
    docker-php-ext-install intl zip pdo pdo_mysql

CMD ["php-fpm"]