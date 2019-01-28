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

namespace Mobilepay\Form;

use Zend\Form\Form;
use Zend\ServiceManager\ServiceManager;
class PaymentConfirmationForm extends Form
{

    /**
     *
     * @var ServiceManager
     */
    protected $serviceManager;

    public function init()
    {
        $this->setName('paymentconfirmationform');
        $this->setAttribute('id','paymentconfirmationform');
        $this->setAttribute('method', 'post');

        $mobilepayService = $this->getServiceManager()->get('mobilepay_service_mobilepay');

        // Form Elements
    $this->add(array(
      'name' => 'submit',
      'type'=>'Zend\Form\Element\Button',
      'attributes' => array(
        'value' => 'Go',
        'id' => 'submitbutton',
        'class'=>'myButton',
        'data-dojo-type'=>"dijit/form/Button",
        'data-dojo-props'=>"type:'submit'",
      ),
    ));
  }

    /**
     *
     * @param ServiceManager $serviceManager
     * @return \Mobilepay\Form\PaymentConfirmationForm
     */
  public function setServiceManager(ServiceManager $sm)
  {
    $this->serviceManager = $sm;
  }
    /**
     *
     * @return \Zend\ServiceManager\ServiceManager
     */
  public function getServiceManager()
  {
    return $this->serviceManager;
  }

}
