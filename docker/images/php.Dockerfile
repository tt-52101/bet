FROM php:8.0.10-apache-buster

# Download script to install PHP extensions and dependencies
ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/

RUN chmod uga+x /usr/local/bin/install-php-extensions && sync

RUN DEBIAN_FRONTEND=noninteractive apt-get update -y\
    && DEBIAN_FRONTEND=noninteractive apt-get install -y\
      curl \
      git \
      zip unzip \
    && install-php-extensions \
      exif \
      gd \
      mysqli \
      opcache \
      pdo_mysql \
      redis \
      zip \
      bcmath \
      mongodb \
      sockets

# Set working directory
WORKDIR /var/www/html

EXPOSE 80

## Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN chown -R www-data:www-data /var/www/html \
    && a2enmod rewrite


## Add user for laravel application
RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

# Copy required filles
COPY ./start.sh /usr/local/bin/start
RUN chmod +x /usr/local/bin/start

# Change current user to www
USER www

CMD ["/usr/local/bin/start"]