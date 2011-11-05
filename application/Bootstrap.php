<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    public function _initAutoloaderNamespaces()
    {
        require_once APPLICATION_PATH . '/../library/Doctrine/Common/ClassLoader.php';

        $autoloader = \Zend_Loader_Autoloader::getInstance();
        $fmmAutoloader = new \Doctrine\Common\ClassLoader('Bisna');
        $autoloader->pushAutoloader(array($fmmAutoloader, 'loadClass'), 'Bisna');
    }
    
    protected function _initViewHelpers()
    {
	$this->bootstrap('layout');
        $layout = $this->getResource('layout');
        $view = $layout->getView();
        //Navigation
        $navConfig = new \Zend_Config_Xml(APPLICATION_PATH . '/configs/navigation.xml', 'nav');
        $navContanier = new \Zend_Navigation($navConfig);
        
        $nav = $view->navigation($navContanier);
    }

}

