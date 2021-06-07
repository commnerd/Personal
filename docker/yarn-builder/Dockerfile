FROM node

VOLUME /var/www/personal

WORKDIR /var/www/personal/resources/ng

RUN npm install -g npm@7.16.0

RUN yarn global add @angular/cli

CMD ["bash", "-c", "yarn && ng build --watch"]
