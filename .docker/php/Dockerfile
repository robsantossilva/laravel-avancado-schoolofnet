FROM php:7.3.33-fpm-alpine3.13

RUN apk add --no-cache shadow

RUN apk add --no-cache openssl \
    bash \
    mysql-client \
    nodejs \
    git \
    npm \
    curl

RUN touch /home/www-data/.bashrc | echo "PS1='\w\$ '" >> /home/www-data/.bashrc

RUN docker-php-ext-install bcmath \
    ctype \
    json \
    mbstring \
    pdo \
    tokenizer \
    pdo_mysql

WORKDIR /var/www
RUN rm -rf /var/www/html

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN ln -s public html

RUN npm config set cache /var/www/.npm-cache --global

RUN usermod -u 1000 www-data
USER www-data

EXPOSE 9000

ENTRYPOINT ["php-fpm"]