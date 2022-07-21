FROM debian:buster-slim

# Install modules
#RUN apt-get install software-properties-common -y

RUN apt-get update && apt-get install -y \
        php7.3-fpm php7.3-common php7.3-mysql php7.3-gmp php7.3-curl \
        php7.3-intl php7.3-mbstring php7.3-xmlrpc php7.3-gd php7.3-xml \
        php7.3-cli php7.3-zip php7.3-soap php7.3-imap php7.3-interbase php7.3-xdebug  \
    --no-install-recommends


#RUN cd ~ \
#    curl -sS https://getcomposer.org/installer -o composer-setup.php \
#    php composer-setup.php --install-dir=/usr/local/bin --filename=composer


#RUN docker-php-ext-install intl mbstring pdo_mysql exif gettext \
#    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
#    && docker-php-ext-install gd

##RUN pecl install -o -f xdebug \
##    && rm -rf /tmp/pear

#COPY ./install-composer.sh /

COPY ./php.ini /etc/php/7.3/fpm/
COPY ./www.conf /etc/php/7.3/fpm/pool.d/

    
#RUN sh /install-composer.sh && rm /install-composer.sh

RUN apt-get purge -y g++ \
    && apt-get autoremove -y \
    && rm -r /var/lib/apt/lists/* \
    && rm -rf /tmp/* 

EXPOSE 9000

RUN usermod -u 1000 www-data

#VOLUME /root/.composer
WORKDIR /var/www

RUN /etc/init.d/php7.3-fpm start 

RUN ln -s  /var/run/php/php7.3-fpm.sock /run/php/php7.3-fpm.sock

CMD ["/usr/sbin/php-fpm7.3", "-F"]


