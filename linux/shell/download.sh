#!/bin/bash

PHP=php-7.2.0
PHP_DOWNLOAD_PATH=http://cn2.php.net/distributions/$PHP.tar.gz

NGINX=nginx-1.12.2
NGINX_DOWNLOAD_PATH=http://nginx.org/download/$NGINX.tar.gz

REDIS=redis-4.0.2
REDIS_DOWNLOAD_PATH=http://download.redis.io/releases/$REDIS.tar.gz

MYSQL=mysql-5.7.21
MYSQL_DOWNLOAD_PATH=https://cdn.mysql.com/Downloads/MySQL-5.7/$MYSQL.tar.gz

MEMCACHED=memcached-1.5.7
MEMCACHED_DOWNLOAD_PATH=http://memcached.org/files/$MEMCACHED.tar.gz

OPENRESTY=openresty-1.11.2.5
OPENRESTY_DOWNLOAD_PATH=https://openresty.org/download/$OPENRESTY.tar.gz

SWOOLE=v1.10.3
SWOOLE_DOWNLOAD_PATH=https://github.com/swoole/swoole-src/archive/$SWOOLE.tar.gz

LARAVEL=v5.6.0
LARAVEL_DOWNLOAD_PATH=https://github.com/laravel/laravel/archive/$LARAVEL.tar.gz

DESIGNPATTERNSPHP=master
DESIGNPATTERNSPHP_DOWNLOAD_PATH=https://github.com/domnikl/DesignPatternsPHP/archive/$DESIGNPATTERNSPHP.zip

RABBITMQ=rabbitmq-server-generic-unix-3.7.0
RABBITMQ_DOWNLOAD_PATH=https://dl.bintray.com/rabbitmq/all/rabbitmq-server/3.7.0/$RABBITMQ.tar.xz

PHP_AMQPLIB=v2.7.2
PHP_AMQPLIB_DOWNLOAD_PATH=https://github.com/php-amqplib/php-amqplib/archive/$PHP_AMQPLIB.tar.gz

RABBITMQ_TUTORIALS=master
RABBITMQ_TUTORIALS_DOWNLOAD_PATH=https://github.com/rabbitmq/rabbitmq-tutorials/archive/$RABBITMQ_TUTORIALS.zip

SQLI_LABS=master
SQLI_LABS_DOWNLOAD_PATH=https://github.com/Audi-1/sqli-labs/archive/master.zip

LNMP=v1.4
LNMP_DOWNLOAD_PATH=https://github.com/licess/lnmp/archive/$LNMP.tar.gz


download() {
    if [ -f $1 ]
    then
        echo "$1 existed."
    else
        echo "$1 not existed, begin to download..."
        wget $2 -O $1;
        if [ $? -eq 0 ]
        then
            echo "download $1 successed;"
        else
            echo "Error: download $1 failed";
            return 1;
        fi
    fi
    return 0
}

download $PHP.tar.gz $PHP_DOWNLOAD_PATH

download $NGINX.tar.gz $NGINX_DOWNLOAD_PATH

download $REDIS.tar.gz $REDIS_DOWNLOAD_PATH

download $MYSQL.tar.gz $MYSQL_DOWNLOAD_PATH

download $MEMCACHED.tar.gz $MEMCACHED_DOWNLOAD_PATH

download $OPENRESTY.tar.gz $OPENRESTY_DOWNLOAD_PATH

download swoole-$SWOOLE.tar.gz $SWOOLE_DOWNLOAD_PATH

download laravel-$LARAVEL.tar.gz $LARAVEL_DOWNLOAD_PATH

download lnmp-$LNMP.tar.gz $LNMP_DOWNLOAD_PATH

download DesignPatternsPHP-$DESIGNPATTERNSPHP.tar.gz $DESIGNPATTERNSPHP_DOWNLOAD_PATH

download $RABBITMQ.tar.gz $RABBITMQ_DOWNLOAD_PATH

download php-amqplib-$PHP_AMQPLIB.tar.gz $PHP_AMQPLIB_DOWNLOAD_PATH

download rabbitmq-tutorials-$RABBITMQ_TUTORIALS.tar.gz $RABBITMQ_TUTORIALS_DOWNLOAD_PATH

download sqli-labs-$SQLI_LABS.tar.gz $SQLI_LABS_DOWNLOAD_PATH
