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

namespace Mobilepay\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{

    protected $mobilepayService;

    protected $mobilepayMenuService;

    protected $serviceManager;

    public function setMobilepayService($mobilepayService)
    {
        return $this->mobilepayService = $mobilepayService;
    }

    public function setMobilepayMenuService($mobilepayMenuService)
    {
        return $this->mobilepayMenuService = $mobilepayMenuService;
    }

    public function setServiceManager($serviceManager)
    {
        return $this->serviceManager = $serviceManager;
    }

    public function indexAction()
    {
        return new ViewModel();
    }
}
