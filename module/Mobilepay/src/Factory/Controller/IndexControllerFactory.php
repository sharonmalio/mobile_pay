<?php
/**
* StoneHMIS (http://stonehmis.afyaresearch.org/)
*
* @link      http://github.com/stonehmis/stone for the canonical source repository
* @copyright Copyright (c) 2009-2019 Afya Research Africa Inc. (http://www.afyaresearch.org)
* @license   http://stonehmis.afyaresearch.org/license/options License Options
* @author    smalio
* @since     25-01-2019
*/

namespace Mobilepay\Factory\Controller;

use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;
use Mobilepay\Controller\IndexController;

class IndexControllerFactory implements FactoryInterface
{

    /**
    *
    * {@inheritdoc}
    * @see \Zend\ServiceManager\Factory\FactoryInterface::__invoke()
    */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $serviceManager = $container->get('ServiceManager');
        $controller = new IndexController();
        $controller->setServiceManager($serviceManager);
        $mobilepayService = $serviceManager->get('mobilepay_service_mobilepay');
        $controller->setMobilepayService($mobilepayService);
        $mobilepayMenuService = $serviceManager->get('mobilepay_service_mobilepaymenu');
        $controller->setMobilepayMenuService($mobilepayMenuService);
        return $controller;
    }

}
