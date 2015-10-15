#!/usr/bin/env bash


echo "----- Provision: Install packages -----"

apt-get update
apt-get -y install tmux git vim build-essential 
