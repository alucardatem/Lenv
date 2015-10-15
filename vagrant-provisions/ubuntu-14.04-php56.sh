#!/usr/bin/env bash

# Ubuntu 14.04 (Trusty)

grep -h "^deb.*ondrej/php5-5.6" /etc/apt/sources.list.d/* > /dev/null 2>&1
if [ $? -ne 0 ]
    then
        echo "----- Provision: Adding PHP 5.6 repository"
        add-apt-repository ppa:ondrej/php5-5.6
fi

echo "----- Provision: PHP 5.6 repo added"

apt-get update

# Apache
echo "----- Provision: Installing apache..."
apt-get install -y apache2
echo "ServerName localhost" > "/etc/apache2/conf-available/fqdn.conf"
a2enconf fqdn
a2enmod rewrite
a2dissite 000-default.conf

echo "----- Provision: Copying the Virtual Host"
cp /vagrant/vm_provision/virtual-host /etc/apache2/sites-available/purveyance.dev.conf
a2ensite purveyance.dev.conf

# Vistual host setup
#echo "----- Provision: Install Host File..."
#cp /etc/apache2/sites-available/000-default.conf /etc/apache2/sites-available/ecomold.dev.conf

# PHP
echo "----- Provision: Install PHP..."
apt-get -y install php5 php5-mcrypt php-apc php5-mysql php5-xdebug

#rm /usr/local/bin/composer

# Composer
if [ ! -f /usr/local/bin/composer ]
    then
        echo "----- Provision: Installing composer"
        curl -sS https://getcomposer.org/installer | php
        mv composer.phar /usr/local/bin/composer
fi

# Other applications
echo "----- Provision: Installing other applications"
apt-get -y install tmux git

# Execute composer
echo "----- Provision: Executing composer"
cd /vagrant
composer update
cd /

# Other settings
echo "----- Provision: Change timezone"
rm /etc/localtime
ln -s /usr/share/zoneinfo/Europe/Bucharest /etc/localtime

# Install xdebug
#pecl install xdebug

# Reload Apache
service apache2 restart

# node js & stuff
if [ ! -f /usr/bin/node ]
    then
        echo "----- Provision: Installing NodeJS"
        curl -sL https://deb.nodesource.com/setup | bash -
        apt-get install -y nodejs
        npm install bower -g
fi

cd /vagrant/static
bower --allow-root update
cd /

# Cleanup
apt-get -y autoremove
