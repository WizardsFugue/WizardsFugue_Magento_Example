<?php
/**
 *
 *
 *
 *
 *
 */

require_once __DIR__ . '/vendor/autoload.php';


$path = __DIR__ . "/mage/";
define('MAGENTO_ROOT', $path);
set_include_path(get_include_path() . PATH_SEPARATOR . $path);
$path = __DIR__ . "/vendor/connect20/Mage_Core_Modules/app/code/core";
set_include_path(get_include_path() . PATH_SEPARATOR . $path);
$path = __DIR__ . "/vendor/connect20/lib_zf/lib/";
set_include_path(get_include_path() . PATH_SEPARATOR . $path);

//$mageFilename = MAGENTO_ROOT . '/app/Mage.php';
//require_once $mageFilename;

define('COMPILER_INCLUDE_PATH', __DIR__ . "/mage/fake_compiler_path");
$originalIncludePath = get_include_path();
if( !class_exists('\Mage') ){
    throw new Exception('Mage Class does not exist');
}
set_include_path( $originalIncludePath );
unset( $originalIncludePath );

$options = array();

$options['config_model'] = '\WizardsFugue\Magenta1\Core\Model\Config';
$options['wizards_fudge'] = array(
    'paths' => array(
        'wf_code_dir' => __DIR__ . DS . 'mage' . DS . 'app' . DS . 'code',
        //'wf_design_dir' => __DIR__.DS.'mage_htdocs'.DS.'app'.DS.'design',
        #'design_dir'    => __DIR__.DS.'mage'.DS.'app'.DS.'design',
        'design_dir'  => __DIR__ . DS . '/vendor/connect20/Interface_Frontend_Base_Default/app/design',
        'skin_dir'    => __DIR__ . DS . 'public' . DS . 'skin',
        'etc_dir'     => __DIR__ . DS . 'mage' . DS . 'app' . DS . 'etc',
        'var_dir'     => __DIR__ . DS . 'mage' . DS . 'var',
        'tmp_dir'     => __DIR__ . DS . 'mage' . DS . 'var' . DS . 'tmp',
        'cache_dir'   => __DIR__ . DS . 'mage' . DS . 'var' . DS . 'cache',
        'log_dir'     => __DIR__ . DS . 'mage' . DS . 'var' . DS . 'log',
        'session_dir' => __DIR__ . DS . 'mage' . DS . 'var' . DS . 'session',

        'media_dir'   => __DIR__ . DS . 'public' . DS . 'media',
	    'admin_design_dir' => __DIR__ . DS . 'vendor/connect20/Interface_Adminhtml_Default/app/design',
    )
);

