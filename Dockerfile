#instruction for base image
FROM debian:buster

ENV AUTOINDEX=on

#instruction for builder_name
LABEL maintainer="ccouliba@student.42.fr"

#instruction for starting all services
RUN apt-get update && apt-get upgrade && apt-get install -y \
    nginx \
    mariadb-server \
    php-mysql \
    php-mbstring \
    php7.3-fpm \
    openssl \
    wget \
    nano

#instruction for building config files
COPY ./srcs/dock_init.sh ./
COPY ./srcs/default ./tmp
COPY ./srcs/phpmyadmin.inc.php ./tmp
COPY ./srcs/wp_config.php ./tmp

#instruction for listened ports
EXPOSE 80 443

#instruction for initialisation command
ENTRYPOINT bash dock_init.sh
