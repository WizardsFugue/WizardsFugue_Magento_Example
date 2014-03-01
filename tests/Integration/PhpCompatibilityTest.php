<?php

namespace WizardsFugue\Magento_Example\Integration;

class PhpCompatibilityTest extends \PHPUnit_Framework_TestCase
{

    public function testGetModel()
    {
        $helper = \Mage::helper('core');
        $this->assertEquals( 'hallo>Welt', $helper->removeTags('<div>hallo>Welt</div>') );
    }
}
