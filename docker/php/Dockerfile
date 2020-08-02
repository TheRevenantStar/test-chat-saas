FROM library/php:7.4.8-cli-alpine3.12
RUN ["apk", "add", "--update", "--no-cache", "libzip-dev", "gettext-dev"]
RUN ["/usr/local/bin/docker-php-ext-install", "gettext","pdo_mysql", "zip"]
COPY [".","/tcsaas"]
WORKDIR /tcsaas/
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN ["/usr/local/bincomposer","install"]
ENTRYPOINT ["/usr/local/bin/php", "artisan", "--host=0.0.0.0", "--port=8000", "serve"]
EXPOSE 8000
