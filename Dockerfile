FROM php:7.4-apache
RUN apt-get update && apt upgrade -y
RUN apt-get update && apt-get install -y libpq-dev php-pgsql && docker-php-ext-install pdo pdo_pgsql
ADD / /var/www/html
EXPOSE 80
EXPOSE 443