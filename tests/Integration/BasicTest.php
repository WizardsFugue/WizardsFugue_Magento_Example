<?php

namespace WizardsFugue\Magento_Example\Integration;

class BasicTest extends \PHPUnit_Framework_TestCase
{

    public function testGetModel()
    {
        $model = \Mage::getModel('core/url');
        $this->assertTrue(!!$model);
    }

    public function testGetVersion()
    {
        $version = \Mage::getVersion();
        $this->assertGreaterThan('1', $version);
    }

    public function testZendHttpClient()
    {
        $class = new \Zend_Http_Client();
        $this->assertInstanceOf('Zend_Http_Client', $class);
    }

    public function testZendLocaleMath()
    {
        $class = new \Zend_Locale_Math();
        $this->assertInstanceOf('Zend_Locale_Math', $class);
    }

    public function testVarienObject()
    {
        $class = new \Varien_Object();
        $this->assertInstanceOf('Varien_Object', $class);
    }

    public function testGetCoreModel()
    {
        $model = \Mage::getModel('core/message');
        $this->assertInstanceOf('Mage_Core_Model_Message', $model);
    }

    public function testCoreHelper()
    {
        $helper = \Mage::helper('core');
        $this->assertInstanceOf('Mage_Core_Helper_Data', $helper);
    }

    public function testCoreHttpHelper()
    {
        $helper = \Mage::helper('core/http');
        $this->assertInstanceOf('Mage_Core_Helper_Http', $helper);
    }

    public function testGiftmessageMessageHelper()
    {
        $helper = \Mage::helper('giftmessage/message');
        $this->assertInstanceOf('Mage_GiftMessage_Helper_Message', $helper, 'GiftMessage is required during checkout and viewing orders');
    }

    public function testWishlistItemCollection()
    {
        $collection = \Mage::getModel('wishlist/item')->getCollection();
        $this->assertTrue(!!$collection, 'Wishlist is required when editing customers');
        $this->assertInstanceOf('Mage_Wishlist_Model_Resource_Item_Collection', $collection, 'Wishlist is required when editing customers');
        //might be Mage_Wishlist_Model_Resource_Item_Collection on older Mages
    }

    public function testNewsletterSubscriber()
    {
        $model = \Mage::getModel('newsletter/subscriber');
        $this->assertTrue(!!$model, 'Newsletter is required when editing customers');
        $this->assertInstanceOf('Mage_Newsletter_Model_Subscriber', $model, 'Newsletter is required when editing customers');
    }
}
