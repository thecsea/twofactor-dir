# twofactor-dir
Build status: [![Build Status](https://travis-ci.org/thecsea/twofactor-dir.svg?branch=master)](https://travis-ci.org/thecsea/twofactor-dir) [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/thecsea/twofactor-dir/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/thecsea/twofactor-dir/?branch=master) [![Code Coverage](https://scrutinizer-ci.com/g/thecsea/twofactor-dir/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/thecsea/twofactor-dir/?branch=master) [![Build Status](https://scrutinizer-ci.com/g/thecsea/twofactor-dir/badges/build.png?b=master)](https://scrutinizer-ci.com/g/thecsea/twofactor-dir/build-status/master) [![Latest Stable Version](https://poser.pugx.org/thecsea/twofactor-dir/v/stable)](https://packagist.org/packages/thecsea/twofactor-dir) [![Total Downloads](https://poser.pugx.org/thecsea/twofactor-dir/downloads)](https://packagist.org/packages/thecsea/twofactor-dir) [![Latest Unstable Version](https://poser.pugx.org/thecsea/twofactor-dir/v/unstable)](https://packagist.org/packages/thecsea/twofactor-dir) [![License](https://poser.pugx.org/thecsea/twofactor-dir/license)](https://packagist.org/packages/thecsea/twofactor-dir)

The most powerful and the simplest library to add two factor authentication by google authenticator, for every directory that you want in just one step

* Add two factor in different directory with different secret
* Lock all pages and files until the correct code is inserted
* Set automatically mod rewrite redirect to insert code page until the correct code is inserted
* Update you htaccess automatically
* Easily installation in each dir in just one step
* Only one software installation location to allow you to manage it easily
* You can always set up two factor in new directories without change other installations, keeping the same software installation location 

#Constraints
* **httacces and mod rewrite needed**
* php write permission
* the date time on the server must be synchronized (only 1 minute of margin) 

#Download
##Get/update composer
This library require composer (download composer here https://getcomposer.org/)

Update composer

`php composer.phar self-update`

##Download

Download via composer require (we suggest to create a dedicated directory for this)

`php composer.phar require thecsea/twofactor-dir`

or insert library as dependency in your composer project

`thecsea/twofactor-dir": "1.0.*`

in the last case you have to install or update you project

`php composer.phar install`

or

`php composer.phar update`

**N.B. If you don't have access to server terminal you can perform installation on your pc and upload all via ftp**

##Update twofactor-dir

You can update *twofactor-dir* (according to version limit set in `composer.json`)

`php composer.phar update`


#Use

##Installation
You can set different different directory keeping only one software location, but **you mustn't change it**

###Set up twofactor-dir
1. Give php write permissions to the directory where you want to set up *twofactor-dir*
1. Enable htacces and mod rewrite
1. open via a browser the following page and insert the directory position (preferably absolute link)

`vendor/thecsea/twofactor-dir/files/install.php`

after this you will see new files and htaccess updated

We suggest to hide via htaccess the *twofactor-dir* installation directory

###First Use
You can get secret or QR code on `YOUR_DIR/get_qr.php`. We suggest to use a https connection

After linked a device we suggest to hide `get_qr.php` for not logged users in the following way:

**CAUTION** Comment `RewriteRule ^get_qr.php$ get_qr.php [L,QSA]` on htaccess generated after get qr for the first time, so you are able to get qr (to add more devices) only after login

##Use
When you try to access to each page of the directory you will be redirected to insert code page, when you insert code you will be logged until the session is closed.

You can add new devices after login (insert code page) calling `YOUR_DIR/get_qr.php`

##Customize

Obviously you can customize interface modifying:
* redirect.php
* get_qr.php

##Disable
You can disable *twofactor-dir* temporarily commenting the redirect instructions on `.htaccess` 

##Uninstall
To unistall *twofactor-dir* for a directory you have to remove the following files from your dir:
* get_qr.php
* redirect.php
* secret.php

and remove the *twofactor-dir* lines (marked) from `.htacces`

**CAUTION: You must keep the *twofactor-dir* installation (installation downloaded by composer) if you have set up it in other directories** 

#By [thecsea.it](http://www.thecsea.it)
