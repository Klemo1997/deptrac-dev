FROM debian:buster

ENV DEBIAN_FRONTEND noninteractive
RUN export XDEBUG_SESSION=PHPSTORM

RUN apt-get update && \
  apt-get -yqq install apt-transport-https  ca-certificates \
  vim unzip \
  wget curl git ssh 

RUN \
  wget -O /etc/apt/trusted.gpg.d/php.gpg https://packages.sury.org/php/apt.gpg && \
  echo "deb https://packages.sury.org/php/ buster main" > /etc/apt/sources.list.d/php.list && \
apt-get -qq update && apt-get -qqy upgrade

RUN  apt-get -qq update && apt-get install -y \
   libapache2-mod-php8.0 php8.0-cgi \
   php8.0-cli        php8.0-gd      php8.0-common    php8.0-intl    \
   php8.0-mbstring     php8.0-mysql    php8.0-opcache      php8.0-readline       php8.0-xml    php8.0-xsl   \
   php8.0-zip   php8.0-sqlite3	  php8.0-curl \
   apache2

RUN apt-get update && echo "Y" | apt-get install php8.0-dev && apt-get install php-pear

RUN yes | pecl install xdebug \
   && echo "zend_extension=/usr/lib/php/20200930/xdebug.so" > /etc/php/8.0/apache2/conf.d/xdebug.ini \
   && echo "xdebug.start_with_request=yes" >> /etc/php/8.0/apache2/conf.d/xdebug.ini \
   && echo "xdebug.client_host=host.docker.internal" >> /etc/php/8.0/apache2/conf.d/xdebug.ini \
   && echo "xdebug.mode=debug" >> /etc/php/8.0/apache2/conf.d/xdebug.ini \
   && echo "xdebug.idekey=PHPSTORM" >> /etc/php/8.0/apache2/conf.d/xdebug.ini \
   && echo "xdebug.remote_autostart=off" >> /etc/php/8.0/apache2/conf.d/xdebug.ini

# Restart apac
RUN a2enmod rewrite

RUN apt-get update && \
  apt-get -yqq install msmtp

#COPY msmtprc /etc/msmtprc
COPY build/php/php.ini /etc/php/8.0/cli/php.ini
COPY build/php/php.ini /etc/php/8.0/apache2/php.ini

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN mkdir -p /var/www/project && a2enmod vhost_alias ssl  rewrite headers 

#aby apache log sel na stdout dockeru
RUN ln -sf /proc/self/fd/1 /var/log/apache2/access.log && \
    ln -sf /proc/self/fd/1 /var/log/apache2/error.log

# Restartni apache, aby sa prejavili pripadne zmeny
RUN service apache2 restart

EXPOSE 80 443

CMD  /usr/sbin/apache2ctl -D FOREGROUND
