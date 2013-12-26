<?php

namespace WizardsFugue\Magento_Example\Integration;

class BasicTest extends \PHPUnit_Framework_TestCase
{
    
    public function testGetModel(){
        $model = \Mage::getModel('core/url');
        $this->assertTrue( !!$model );
    }
    
    public function testGetVersion(){
        $version = \Mage::getVersionInfo();
        $this->assertEquals('1', $version['major']);
    }
    
    
}