FROM node:14.7.0-alpine3.10
RUN npm install -g laravel-echo-server
COPY ["./laravel-echo-server.json", "/laravel-echo-server.json"]
WORKDIR /
ENTRYPOINT ["laravel-echo-server", "start"]
