#!/usr/bin/env bash

echo "----- Provision: Installing apache -----"
apt-get install -y apache2 apache2-dev
echo "ServerName localhost" >> "/etc/apache2/apache2.conf"
a2enmod rewrite
#a2dissite 000-default.conf
