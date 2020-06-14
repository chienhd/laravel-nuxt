FROM php:7.3-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y --no-install-recommends \
        software-properties-common \
        apt-utils \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libjpeg-dev \
        libpng-dev \
        libpq-dev \
        libicu-dev \
        libzip-dev \
        zip \
        libmosquitto-dev \
        git \
        build-essential \
        apt-transport-https \
        curl \
        ca-certificates \
        gnupg2 \
    && docker-php-ext-configure gd \
        --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install \
        intl \
        opcache \
        pgsql \
        pdo \
        pdo_mysql \
        mysqli \
        pdo_pgsql \
        gd \
        mbstring \
        zip \
    && docker-php-ext-enable \
        intl \
        opcache \
        mysqli \
        pdo \
        pdo_mysql \
        gd \
        mbstring \
        zip \
    && pecl install -o -f redis \
    && docker-php-ext-enable redis \
    && apt-get install -y procps

# Get latest Composer
# COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN curl -sS https://getcomposer.org/installer | php -- \
--install-dir=/usr/bin --filename=composer && chmod +x /usr/bin/composer 

WORKDIR /var/www/html
