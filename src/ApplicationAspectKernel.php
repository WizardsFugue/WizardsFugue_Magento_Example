<?php
/**
 * 
 * 
 * 
 * 
 */


use Go\Core\AspectKernel;
use Go\Core\AspectContainer;

/**
 * Application Aspect Kernel
 */
class ApplicationAspectKernel extends AspectKernel
{

    /**
     * Configure an AspectContainer with advisors, aspects and pointcuts
     *
     * @param AspectContainer $container
     *
     * @return void
     */
    protected function configureAop(AspectContainer $container)
    {
        //$container->registerAspect(new \Aspect\MonitorAspect());
    }


    protected function getDefaultOptions()
    {
        $options = parent::getDefaultOptions();
        $options['cacheDir'] = __DIR__ . '/../mage/var/aop';
        $options['appDir']   = __DIR__ . '/../';
        return $options;
    }
}