FROM php:8.1-apache-buster

RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

# Install dependencias
RUN docker-php-ext-install pdo pdo_mysql

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install nodejs e npm
RUN curl -sL https://deb.nodesource.com/setup_14.x | bash -
RUN apt-get install -y \
    nodejs
RUN npm install -g  n
RUN n 14.18.1
RUN npm install npm@8.1.4 -g

# dev_data
RUN mkdir /srv/dev_data && \
        mkdir /srv/dev_data/enrictips

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

EXPOSE 80
