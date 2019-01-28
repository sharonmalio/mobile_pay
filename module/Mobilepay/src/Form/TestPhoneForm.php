<?php
namespace Mobilepay\Form;


use Zend\Form\Form;
use Zend\ServiceManager\ServiceManager;

class TestPhoneForm extends Form
{
    protected $serviceManager;
    
    public function init()
    {
        $this->setName('testphoneform');
        $this->setAttribute('id', 'testphoneform');
        $this->setAttribute('method', 'post');
        
        
        $this->add([
            'name' => 'phone_number',
            'type' => 'text',
            'options' => [
                'label' => 'Phone number'
            ]
        ]);
        
        
        
        $this->add([
            'name' => 'submit',
            'type' => 'Zend\Form\Element\Button',
            'attributes' => [
                'value' => 'Confirm',
                'id' => 'submitbutton'
            ]
        ]);
        
    }
    
  
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
