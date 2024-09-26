FROM php:8-apache
COPY . /var/www/html
WORKDIR /var/www/html
RUN chmod 777 upload
