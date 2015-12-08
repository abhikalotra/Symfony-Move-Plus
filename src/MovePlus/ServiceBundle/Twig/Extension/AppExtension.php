<?php

namespace MovePlus\ServiceBundle\Twig\Extension;

use CG\Core\ClassUtils;

class AppExtension extends \Twig_Extension
{
    
    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('htmldecode', array($this, 'htmldecodeFilter')),
            new \Twig_SimpleFilter('title', array($this, 'titleFilter')),
            new \Twig_SimpleFilter('substring', array($this, 'substringFilter')),
        );
    }
    
    public function htmldecodeFilter($string)
    {
        return html_entity_decode($string);
    }
    
    
    public function titleFilter($string)
    {
        $string = ucwords(str_replace(')','',strtolower(str_replace('(','',$string))));
        $string = str_replace(', ,',',',$string);
        $string = str_replace(' ,',', ',$string);
        return html_entity_decode($string);
    }
    
    public function substringFilter($string,$start,$end)
    {
        return strip_tags(substr($string,$start,$end));
    }
    
    public function getName()
    {
        return 'app_extension';
    }
}
