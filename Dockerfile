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
    mariadb-server \
    openssl
    # php php-mysql php-curl php-gd php-mbstring php-xml php-xmlrpc php-soap php-intl php-zip \
    # wordpress \

# NGINX
WORKDIR /etc/nginx/
RUN rm sites-enabled/default
COPY srcs/myserver.conf conf.d

# SERVER PATH
WORKDIR /var/www/
RUN mkdir my_server
COPY srcs/index.php my_server

# MYSQL
WORKDIR /tmp
COPY srcs/config.sql .
RUN service mysql start && mysql < config.sql
RUN rm config.sql

# PHPMYADMIN
WORKDIR /var/www/my_server/
COPY srcs/phpMyAdmin.tar.gz .
RUN mkdir phpmyadmin && \
    tar zxf phpMyAdmin.tar.gz --strip-components=1 -C phpmyadmin && \
    rm phpMyAdmin.tar.gz
COPY srcs/config.inc.php phpmyadmin

#WORDPRESS
COPY srcs/wordpress.tar.gz .
RUN tar zxf wordpress.tar.gz --strip-components=1 && \
    rm wordpress.tar.gz
COPY srcs/wp-config.php .

RUN openssl req -x509 -out /etc/ssl/certs/myserver.crt -keyout /etc/ssl/private/myserver.key \
  -newkey rsa:2048 -nodes -sha256 \
  -subj '/CN=localhost'

CMD service nginx start && service mysql restart --skip-grant-tables && service php7.3-fpm start && bash

# NOTES :
# apt-get upgrade; \ >> DO NOT USE THIS COMMAND
# always update && install on same line