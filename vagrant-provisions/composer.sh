#!/usr/bin/env bash

# Composer
if [ ! -f /usr/local/bin/composer ]
    then
        echo "----- Provision: Installing composer -----"
        curl -sS https://getcomposer.org/installer | php
        mv composer.phar /usr/local/bin/composer
fi


if [ -f /vagrant/composer.json ]
	then
		echo "----- Provision: Executing composer -----"
		cd /vagrant
		composer update
		cd /
fi
