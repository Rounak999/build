FROM php:8.3.4-apache
COPY . /var/www/html
WORKDIR /var/www/html
RUN chmod 777 upload
