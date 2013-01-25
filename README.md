Apache2.4+PHP5.4 build pack for Mahara
========================

This is a build pack bundling PHP and Apache for Heroku apps.

Configuration
-------------

The config files are bundled with the build pack itself:

* conf/httpd.conf
* conf/php.ini
* conf/config.php (Mahara default configuration)


Pre-compiling binaries
----------------------

    # apache
    mkdir /app
    wget http://www.carfab.com/apachesoftware/httpd/httpd-2.4.3.tar.gz
    tar xvzf httpd-2.4.3.tar.gz
    cd httpd-2.4.3
    ./configure --prefix=/app/apache --enable-rewrite
    make
    make install
    cd ..
    
    # php
    wget http://us2.php.net/get/php-5.4.11.tar.gz/from/us.php.net/mirror 
    mv mirror php.tar.gz
    tar xzvf php.tar.gz
    cd php-5.4.11/
    ./configure --prefix=/app/php --with-apxs2=/app/apache/bin/apxs --with-mysql --with-pdo-mysql --with-pgsql --with-pdo-pgsql --with-iconv --with-gd --with-curl=/usr/lib --with-config-file-path=/app/php --enable-soap=shared --with-libxml --with-simplexml --with-session --with-xmlrpc --with-openssl --enable-mbstring --with-bz2 --with-zlib
    make
    make install
    cd ..
    
    # php extensions
    mkdir /app/php/ext
    cp /usr/lib/libmysqlclient.so.15 /app/php/ext/
    apt-get install php5-mcrypt
    cp /usr/lib/php5/20090626/mcrypt.so /app/php/ext/
    
    # pear
    apt-get install php5-dev php-pear
    pear config-set php_dir /app/php
    pecl install apc
    mkdir /app/php/include/php/ext/apc
    cp /usr/lib/php5/20060613/apc.so /app/php/ext/
    cp /usr/include/php5/ext/apc/apc_serializer.h /app/php/include/php/ext/apc/
    
    # utilities
    apt-get install zip unzip
    
    # package
    cd /app
    echo '2.4.3' > apache/VERSION
    tar -zcvf apache.tar.gz apache
    echo '5.4.11' > php/VERSION
    tar -zcvf php.tar.gz php

    # create mahara data folder
    cd /app
    mkdir maharadata
    chmod 777 maharadata


Hacking
-------

To change this buildpack, fork it on Github. Push up changes to your fork, then create a test app with --buildpack <your-github-url> and push to it.


Meta
----

Created by Pedro Belo.
Many thanks to Keith Rarick for the help with assorted Unix topics :)
Customized by Son Nguyen for Mahara deployment on Heroku
