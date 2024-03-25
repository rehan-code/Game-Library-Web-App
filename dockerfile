FROM php:8.2-fpm
WORKDIR /app/public
RUN apt-get update && apt-get install -y php-mysqli