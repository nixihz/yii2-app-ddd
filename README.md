# Yii2 in ddd

based on yii framework 2.0

** PHP 8.0 +**

## setup

### composer

```
composer install -vvv

```

### config

```shell
cp config/.env.example.dev config/.env

```

### development

nginx/server.conf

```nginx
server {
    listen 80;
    listen 443 ssl ;
    server_name demo.com;

    access_log /opt/logs/nginx/demo.com.access.log;
    error_log  /opt/logs/nginx/demo.com.error.log;

    root /opt/case/demo.com/app/web;
    index  index.php index.html index.htm;

    location / {
        try_files $uri  /index.php$is_args$args;
    }

    ssl_certificate         ssl/demo.com.pem;
    ssl_certificate_key     ssl/demo.com.key;
    location ~ \.php {
        fastcgi_pass   127.0.0.1:9080;
        fastcgi_index  index.php;
        include        fastcgi.conf;
    }
}

```

## console

no more `yii-dev` or `yii-test` ...

```shell

/usr/local/opt/php@8.0/bin/php ./yii

```

## console

### 1. generate PO within gii

```
php ./yii gii/model --tableName=users --ns=internal\\domain\\user\\repository\\po --modelClass=UserPO


```

# Guide

DDD

## struct

```
├── app // web index
│   ├── assembler
│   │   └── common
│   ├── config
│   │   ├── bootstrap.php
│   │   ├── main.php
│   │   └── params.php
│   ├── controllers
│   │   ├── SiteController.php
│   │   └── common
│   ├── dto
│   │   └── common
│   └── web
│       └── index.php
├── config
│   ├── .env // cp .env.example.xxx .env
│   ├── .env.example.local
│   ├── .env.example.dev
│   ├── .env.example.test
│   ├── .env.example.prod
│   ├── bootstrap.php
│   ├── error-code.php
│   ├── events.php
│   ├── main.php
│   └── params.php
├── console
│   ├── config
│   │   ├── bootstrap.php
│   │   ├── main.php
│   │   └── params.php
│   ├── controllers
│   └── migrations
├── internal
│   ├── application // 应用层
│   │   ├── job
│   │   └── service
│   ├── base
│   │   ├── BaseController.php
│   │   ├── BizException.php
│   │   ├── NormalException.php
│   │   └── dto
│   ├── components
│   │   └── EventListener.php
│   ├── constants
│   ├── domain // 领域层
│   │   ├── category
│   │   ├── thread
│   │   └── user
│   └── infra // infrastration
│       ├── pkg
│       └── utils
├── runtime
│   ├── app
│   │   ├── cache
│   │   ├── debug
│   │   └── logs
│   └── console
│       └── logs
└── yii

```