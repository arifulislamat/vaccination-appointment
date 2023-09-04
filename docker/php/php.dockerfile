FROM php:8.1-fpm-alpine AS php-base

WORKDIR /var/www/html

# Install Additional dependencies
RUN apk update && apk add --no-cache \
    build-base shadow vim curl \
    php81-curl \
    php81-common \
    php81-pdo \
    php81-pdo_mysql \
    php81-mysqli \
    php81-mbstring \
    php81-xml \
    php81-openssl \
    php81-json \
    php81-phar \
    php81-dom \
    php81-session \
    php81-pcntl

RUN docker-php-ext-install pdo pdo_mysql
RUN docker-php-ext-enable pdo_mysql

RUN docker-php-ext-install opcache
RUN docker-php-ext-enable opcache

# Install PHP Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy existing application directory permissions
COPY --chown=www-data:www-data . /var/www/html
COPY docker/php/php.ini /usr/local/etc/php/

COPY docker/php/entrypoint.sh /usr/local/bin
RUN chmod +x /usr/local/bin/entrypoint.sh

ENTRYPOINT ["sh", "/usr/local/bin/entrypoint.sh"]

CMD php -S 0.0.0.0:19090 -t public
EXPOSE 19090


