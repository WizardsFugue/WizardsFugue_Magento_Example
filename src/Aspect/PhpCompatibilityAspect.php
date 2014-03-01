<?php
/**
 * 
 * 
 * 
 * 
 */

namespace Aspect;

use Go\Aop\Aspect;
use Go\Aop\Intercept\MethodInvocation;
use Go\Lang\Annotation\Around;

class PhpCompatibilityAspect implements Aspect{

    /**
     * fix deprecated Issue
     *
     * @param MethodInvocation $invocation Invocation
     * @Around("execution(public Mage_Core_Helper_Abstract->removeTags(*))")
     */
    public function beforeMethodExecution(MethodInvocation $invocation)
    {
        $arguments = $invocation->getArguments();
        $html = $arguments[0];

        $html = preg_replace_callback(
            "# <(?![/a-z]) | (?<=\s)>(?![a-z]) #xi",
            function($html){ return htmlentities($html[0]); },
            $html
        );
        $html =  strip_tags($html);
        return htmlspecialchars_decode($html);
    }

} 