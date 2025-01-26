# Image de base légère avec PHP 8.2 et FPM
FROM php:8.2-fpm-alpine

# Installation des dépendances système avec mise en cache optimisée
RUN apk add --no-cache \
    libzip-dev \
    zip \
    nodejs \
    npm \
    git \
    curl \
    vim \
    linux-headers \
    $PHPIZE_DEPS

# Installation de Xdebug
RUN pecl install xdebug && \
    docker-php-ext-enable xdebug

# Installation des extensions PHP essentielles pour Laravel
RUN docker-php-ext-install pdo pdo_mysql zip \
    && docker-php-ext-configure opcache --enable-opcache \
    && docker-php-ext-install opcache

# Configuration OPcache
RUN { \
  echo 'opcache.memory_consumption=128'; \
  echo 'opcache.interned_strings_buffer=8'; \
  echo 'opcache.max_accelerated_files=4000'; \
  echo 'opcache.revalidate_freq=2'; \
  echo 'opcache.fast_shutdown=1'; \
  echo 'opcache.enable_cli=1'; \
} > /usr/local/etc/php/conf.d/opcache-recommended.ini

# Installation de Composer de manière optimisée
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Configuration de Xdebug
RUN echo "xdebug.mode=debug" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini && \
    echo "xdebug.client_host=host.docker.internal" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini && \
    echo "xdebug.start_with_request=yes" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

# Configuration des permissions pour le dossier de travail
RUN chown -R www-data:www-data /var/www/html