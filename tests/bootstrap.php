<?php

require __DIR__ . '/../bootstrap.php';


Mage::setIsDeveloperMode(true);


Mage::register('custom_entry_point', true);


ini_set('display_errors', 1);

umask(0);



Mage::app('', 'store', $options);


