#!/usr/bin/env php
<?php

$version = $argv[1];

$composerFile = __DIR__ . '/../../composer.json';

$content = json_decode( file_get_contents($composerFile), true );

switch($version){
    case "1.8": 
        $content['require']['connect20/mage_all_latest'] = '1.8.0.0-alpha1';
        break;
    default: 
        $content['require']['connect20/mage_all_latest'] =  "$version.*";
        break;
}


file_put_contents( $composerFile, json_encode($content) );

