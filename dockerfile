FROM php:8.2-fpm
WORKDIR /app/public
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli
# RUN apt-get update && apt-get install -y php-mysqli