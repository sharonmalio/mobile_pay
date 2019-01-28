<?php
return [
  'Mobilepay\Controller\Index' => 'Mobilepay\Factory\Controller\IndexControllerFactory',
  Mobilepay\Controller\IndexController::class => Mobilepay\Factory\Controller\IndexControllerFactory::class,
  'Mobilepay\Controller\Mobilepay' => 'Mobilepay\Factory\Controller\MobilepayControllerFactory',
  Mobilepay\Controller\MobilepayController::class => Mobilepay\Factory\Controller\MobilepayControllerFactory::class
];
