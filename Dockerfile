FROM php:8.1-cli

RUN apt-get update && apt-get install -qqy git unzip libcurl4-openssl-dev \
        libaio1 wget && apt-get clean autoclean && apt-get autoremove --yes &&  rm -rf /var/lib/{apt,dpkg,cache,log}/ 

#composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

    
# Install Oracle extensions
RUN docker-php-ext-install curl 

#install some base extensions
RUN apt-get install -y libzip-dev zip \
  && docker-php-ext-install zip

RUN cd /usr/local/etc/php/conf.d/ && \
  echo 'memory_limit = -1' >> /usr/local/etc/php/conf.d/docker-php-memlimit.ini

RUN cd /etc/ssl && \
  echo 'CipherString = DEFAULT@SECLEVEL=1' >> openssl.cnf

COPY . /app

WORKDIR /app 

RUN composer update

#ENTRYPOINT ["php", "run.php"]
ENTRYPOINT ["tail", "-f", "/dev/null"]