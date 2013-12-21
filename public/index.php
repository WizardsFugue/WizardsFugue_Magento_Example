<?php
/**
 * 
 * 
 * 
 * 
 * 
 */ 


require __DIR__ . '/../bootstrap.php';




#Varien_Profiler::enable();


Mage::setIsDeveloperMode(true);


Mage::register('custom_entry_point', true);


ini_set('display_errors', 1);

umask(0);

/* Store or website code */
$mageRunCode = isset($_SERVER['MAGE_RUN_CODE']) ? $_SERVER['MAGE_RUN_CODE'] : '';
$mageRunCode = "view_3";

/* Run store or run website */
$mageRunType = isset($_SERVER['MAGE_RUN_TYPE']) ? $_SERVER['MAGE_RUN_TYPE'] : 'store';


Mage::run($mageRunCode, $mageRunType, $options);

