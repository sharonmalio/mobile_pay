<?php
return [
  'mobilepay_service_mobilepay' => 'Mobilepay\Factory\Service\MobilepayFactory',
  'Mobilepay\Service\Mobilepay' => 'Mobilepay\Factory\Service\MobilepayFactory',
  Mobilepay\Service\Mobilepay::class => Mobilepay\Factory\Service\MobilepayFactory::class,
  'mobilepay_service_mobilepaymenu' => 'Mobilepay\Factory\Service\MobilepayMenuFactory',
  'Mobilepay\Service\MobilepayMenu' => 'Mobilepay\Factory\Service\MobilepayMenuFactory',
  Mobilepay\Service\MobilepayMenu::class => Mobilepay\Factory\Service\MobilepayMenuFactory::class,
  'Mobilepay\Model\TestPhoneTable' => 'Mobilepay\Factory\Model\TestPhoneTableFactory',
  Mobilepay\Model\TestPhoneTable::class => Mobilepay\Factory\Model\TestPhoneTableFactory::class,
  'Mobilepay\Model\PaymentConfirmation' => 'Mobilepay\Factory\Model\PaymentConfirmationFactory',
  Mobilepay\Model\PaymentConfirmation::class => Mobilepay\Factory\Model\PaymentConfirmationFactory::class,
  'Mobilepay\Model\TestPhone' => 'Mobilepay\Factory\Model\TestPhoneFactory',
  Mobilepay\Model\TestPhone::class => Mobilepay\Factory\Model\TestPhoneFactory::class,
  'Mobilepay\Model\PaymentConfirmationTable' => 'Mobilepay\Factory\Model\PaymentConfirmationTableFactory',
  Mobilepay\Model\PaymentConfirmationTable::class => Mobilepay\Factory\Model\PaymentConfirmationTableFactory::class
];
