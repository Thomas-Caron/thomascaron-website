FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
    libzip-dev \
    libpq-dev \
    unzip \
    git && \
    docker-php-ext-install zip pdo pdo_mysql

CMD ["php-fpm"]