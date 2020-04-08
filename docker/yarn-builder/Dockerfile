FROM node

VOLUME /var/www/personal

WORKDIR /var/www/personal

RUN npm install --force --global yarn

CMD ["bash", "-c", "yarn && yarn watch"]
