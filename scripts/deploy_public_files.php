#!/usr/bin/env php
<?php

chdir(__DIR__ . '/../public/');

passthru('cp -r ../vendor/connect20/Lib_Js_Calendar/js ./');
passthru('cp -r ../vendor/connect20/Lib_Js_Ext/js ./');
passthru('cp -r ../vendor/connect20/Lib_Js_Mage/js ./');
passthru('cp -r ../vendor/connect20/Lib_Js_Prototype/js ./');
passthru('cp -r ../vendor/connect20/Lib_Js_TinyMCE/js ./');



passthru('cp -r ../vendor/connect20/Interface_Frontend_Default/skin ./');
passthru('cp -r ../vendor/connect20/Interface_Frontend_Base_Default/skin ./');

