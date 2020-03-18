#!/usr/bin/env bash

source /app/vagrant/provision/common.sh

#== Provision script ==

info "Provision-script user: `whoami`"

info "Restart web-stack"
Service php7.2-fpm restart
Service nginx restart
Service postgresql restart