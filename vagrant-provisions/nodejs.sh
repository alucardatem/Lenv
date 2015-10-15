#!/usr/bin/env bash

if [ ! -f /usr/bin/node ]
    then
        echo "----- Provision: Installing NodeJS -----"
        curl -sL https://deb.nodesource.com/setup | bash -
        apt-get install -y nodejs
        npm install -g bower gulp
fi
