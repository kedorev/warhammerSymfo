FROM php:7.2-fpm-alpine3.7

RUN apk add --update \
    php7.2-apcu \
    php7.2-ctype \
    php7.2-curl \
    php7.2-dom \
    php7.2-gd \
    php7.2-iconv \
    php7.2-imagick \
    php7.2-json \
    php7.2-intl \
    php7.2-mcrypt \
    php7.2-mbstring \
    php7.2-opcache \
    php7.2-openssl \
    php7.2-pdo \
    php7.2-pdo_mysql \
    php7.2-mysqli \
    php7.2-xml \
    php7.2-zlib \
    php7.2-phar \
    php7.2-tokenizer \
    php7.2-session \
    php7.2-simplexml \
    make \
    curl

RUN rm -rf /var/cache/apk/* && rm -rf /tmp/*

RUN curl --insecure https://getcomposer.org/composer.phar -o /usr/bin/composer && chmod +x /usr/bin/composer

ADD symfony.ini /etc/php7/php-fpm.d/
ADD symfony.ini /etc/php7/cli/conf.d/

ADD symfony.pool.conf /etc/php7/php-fpm.d/

ADD chmod 777 -R var/

WORKDIR /var/www/symfony
EXPOSE 9000

CMD ["php-fpm7", "-F"]
