#!/usr/bin/env bash

if [ ! -e /usr/bin/php ] && [ ! -e /usr/local/bin/php ]
    then
        if [ ! -e php-5.3.29.tar.bz2 ]
            then
                wget http://in1.php.net/distributions/php-5.3.29.tar.bz2
        fi

        apt-get install -y libxml2-dev libcurl4-openssl-dev pkg-config bzip2 libpng12-dev libjpeg-dev libxslt1-dev libmcrypt-dev libfreetype6-dev libgmp-dev libreadline-dev libltdl-dev libmysqld-dev

        mkdir /usr/include/freetype2
        mkdir /usr/include/freetype2/freetype
        ln -s /usr/include/freetype2/freetype.h /usr/include/freetype2/freetype/freetype.h
        ln -s /usr/include/x86_64-linux-gnu/gmp.h /usr/include/gmp.h

        tar -xvf php-5.3.29.tar.bz2
        cd php-5.3.29
        ./configure \
            --with-libdir=/lib/x86_64-linux-gnu \
            --with-apxs2 \
            --with-openssl \
            --with-zlib \
            --enable-bcmath \
            --with-curl \
            --with-inifile \
            --with-libxml-dir \
            --enable-ftp \
            --enable-maintainer-zts \
            --with-tsrm-pthreads \
            --with-gd --with-jpeg-dir --with-png-dir --with-ttf --with-freetype-dir \
            --enable-gd-native-ttf --with-gmp --enable-mbstring --with-mcrypt --with-mysqli=mysqlnd \
            --enable-pcntl --with-pdo-mysql=mysqlnd --with-pdo-sqlite --with-readline --enable-soap --enable-sockets --with-xmlrpc
        make
        make install
        cp php.ini-development /usr/local/lib/php/php.ini
        cd ../
        rm -rf php-5.3.29.tar.bz2

        echo '<FilesMatch "\.ph(p[2-6]?|tml)$">
    SetHandler application/x-httpd-php
</FilesMatch>' >> /etc/apache2/apache2.conf

        # echo "<?php phpinfo();" >> /var/www/html/index.php
fi