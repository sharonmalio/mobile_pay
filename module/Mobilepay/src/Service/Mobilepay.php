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

namespace Mobilepay\Service;

use Zend\ServiceManager\ServiceManager;

class Mobilepay
{

	protected $serviceManager;

	public function getServiceManager()
	{
		return $this->serviceManager;
	}

	public function setServiceManager(ServiceManager $serviceManager)
	{
		return $this->serviceManager = $serviceManager;
		return $this;
	}

}
