FROM php

RUN apt-get update && apt-get install -y \
    zlib1g-dev \
	curl \
	unzip

RUN apt-get remove libssl-dev

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer


RUN pecl install grpc protobuf
RUN echo "extension=grpc.so" > /usr/local/etc/php/conf.d/php-ext-grpc.ini

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
