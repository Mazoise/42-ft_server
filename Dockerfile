FROM debian:buster

RUN apt-get update && apt-get install -y \
    nginx \ 
    php7.3 \
    php7.3-fpm \
    php7.3-mbstring \
    php7.3-zip \
    php7.3-gd \
    php7.3-xml \
    php-pear \
    php7.3-gettext \
    php7.3-cgi \
    php7.3-mysql \
    mariadb-server
    # php php-mysql php-curl php-gd php-mbstring php-xml php-xmlrpc php-soap php-intl php-zip \
    # wordpress \

WORKDIR /etc/nginx/
RUN rm sites-enabled/default
COPY srcs/myserver.conf conf.d

WORKDIR /var/www/
RUN mkdir my_server
COPY srcs/index.php my_server

WORKDIR /tmp
COPY srcs/config.sql .
RUN service mysql start && mysql < config.sql
RUN rm config.sql

WORKDIR /var/www/my_server/
COPY srcs/phpMyAdmin.tar.gz .
RUN mkdir phpmyadmin && \
    tar zxf phpMyAdmin.tar.gz --strip-components=1 -C phpmyadmin && \
    rm phpMyAdmin.tar.gz
COPY srcs/config.inc.php phpmyadmin

CMD service nginx start && service mysql restart --skip-grant-tables && service php7.3-fpm start && bash

# NOTES :
# apt-get upgrade; \ >> DO NOT USE THIS COMMAND
# always update && install on same line