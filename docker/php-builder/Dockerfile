FROM php:8.0.1-cli

RUN apt-get update && \
    apt-get install -y \
        mycli && \
    rm -rf /var/lib/apt/lists/*

ADD init.sh /init.sh

ENTRYPOINT /init.sh
