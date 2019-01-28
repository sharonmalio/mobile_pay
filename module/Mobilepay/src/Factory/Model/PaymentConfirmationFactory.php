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

namespace Mobilepay\Factory\Model;

use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;
use Mobilepay\Model\PaymentConfirmation;

class PaymentConfirmationFactory implements FactoryInterface
{

	/**
	* Invoke
	*
	*@param ContainerInterface $container, $requestedName, *@params array $options = null
	* @return mixed
	*/
	public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
	{
		$dbAdapter = $container->get('ServiceManager')->get('Zend\Db\Adapter\Adapter');
		$model = new PaymentConfirmation($dbAdapter);
		return $model;
	}
}
