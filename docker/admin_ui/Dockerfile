FROM node:23.10.0

RUN npm install -g \
        npm@11.2.0 \
        @angular/cli@19.2.4 && \
    apt update && \
    apt install -y chromium

ENV CHROME_BIN=/usr/bin/chromium

WORKDIR /project/resources/admin_ui

CMD yarn && yarn watch --output-path='../../storage/app/admin/' --base-href='/admin/'
