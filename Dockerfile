FROM php:8.3.22-apache
COPY . /var/www/html
WORKDIR /var/www/html
RUN chmod 777 upload
