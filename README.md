WizardsFugue_Magento_Example
============================

[![Build Status](https://travis-ci.org/WizardsFugue/WizardsFugue_Magento_Example.png?branch=master)](https://travis-ci.org/WizardsFugue/WizardsFugue_Magento_Example)

Example on how to setup Magento complete with Composer


Install
-------

You need to execute composer with the ```--no-custom-installers --no-plugins``` argument

And you need to have a working database install. Noone has tested yet how do the magento install process with this.
So, for now use your local.xml from another install you have.

We have a mage folder with all magento specific files, like for example config files ( "local.xml", "modules/" and so on)

Remember to have a correct store url config.

Before you start you need to execute the ```scripts/deploy_public_files.php``` script
for having all js and skin files in public directory.



Summary
-------


```
git clone https://github.com/WizardsFugue/WizardsFugue_Magento_Example.git
cd WizardsFugue_Magento_Example
composer.phar install

cd public
php ../scripts/deploy_public_files.php

../dev_server.sh


```

now add your local.xml, and with luck it runs :D

