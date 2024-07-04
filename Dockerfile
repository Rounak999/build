FROM php:8.1-apache
COPY . /var/www/html
WORKDIR /var/www/html
RUN chmod 777 upload
