FROM node:latest

RUN npm install -g npm@9.7.2
RUN npm install -g @angular/cli

WORKDIR /project

CMD cd resources/admin_ui && yarn && yarn watch --base-href='/admin/'
