FROM php:7.3-apache-buster

RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf
# RUN apk add --no-cache mysql-client
RUN docker-php-ext-install pdo pdo_mysql
EXPOSE 80