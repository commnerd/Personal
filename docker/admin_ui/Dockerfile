FROM node:18.16.0

RUN npm install -g \
        npm@9.7.2 \
        @angular/cli && \
    apt update && \
    apt install wget && \
    cd /tmp && \
    wget https://dl.google.com/linux/direct/google-chrome-stable_current_amd64.deb && \
    apt install -y ./google-chrome-stable_current_amd64.deb


ENV CHROME_BIN=/usr/bin/google-chrome

WORKDIR /project/resources/admin_ui

CMD yarn && yarn watch --output-path='../../storage/app/admin/' --base-href='/admin/'
