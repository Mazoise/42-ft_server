FROM debian:buster

RUN apt-get update; \
    apt-get upgrade; \
    apt-get apt-utils; \
    apt-get install -y nginx; \
    apt-get install -y php; \
    apt-get install -y wordpress; \