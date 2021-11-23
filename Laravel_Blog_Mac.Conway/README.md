# Lab2 - Laravel Blog with Docker

Bill.Dou@itas.ca \
Oct 14, 2021

## Usage

Download lab2 repo
```
$ git clone https://github.com/itas-bill-dou/itas255_f21_laravel_docker.git
```
Copy whole files into your local private repo: lab2

```
$ cd lab2
$ docker-composer up --build
```
After all containers are created, get into `workspace` container and run the following commands:

```
$ cp .env.example .env
$ php artisan key:generate
$ php artisan storage:link
$ npm install && npm run watch
```

### Website

http://localhost:8020/


### PHPMyAdmin

PHPMyAdmin: http://localhost:8021/\
server:db\
username: root\
password: