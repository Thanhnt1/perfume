# Installation Guide

## Install GIT

> sudo yum install git-all

Check result:

> git --version

## Install PHP7

Reference: https://www.tecmint.com/install-php-7-in-centos-7/

> sudo yum install ttps://dl.fedoraproject.org/pub/epel/epel-release-latest-7.noarch.rpm

> sudo yum install http://rpms.remirepo.net/enterprise/remi-release-7.rpm

> sudo yum install yum-utils

> sudo yum-config-manager --enable remi-php72

> sudo yum install php php-mcrypt php-cli php-gd php-curl php-mysql php-ldap php-zip php-fileinfo php-mbstring php-xml

Check result:

> php -v

## Install Composer

Follow instruction in this link: https://getcomposer.org/download/

Then change owner to root:

> sudo chown root:root ~/composer.phar

Then move the ~/composer.phar to /usr/bin/composer:

> sudo mv ~/composer.phar /usr/bin/composer

Check result:

> composer --version

## Checkout code

> git clone --single-branch -b develop https://github.com/Thanhnt1/perfume

## Run code
> php artisan key:generate

> php artisan migrate

> php artisan db:seed

> php artisan storage:link

> php artisan dev

## Dropbox

- Generate token dropbox : https://www.dropbox.com/developers/apps/info/meqc1c76lpn3hkb

