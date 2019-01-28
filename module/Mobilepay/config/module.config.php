<?php
namespace Appointments;


use Zend\Router\Http\Segment;
use Mobilepay\Service\Mobilepay;
use Mobilepay\Controller\MobilepayController;
return [
    'router' => [
        'routes' => [
            'mobilepay' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/mobilepay',
                    'defaults' => [
                        'controller' => MobilepayController::class,
                        'action' => 'index'
                    ]
                ],
                'may_terminate' => true,
                'child_routes' => [
                    'mobilepay' => [
                        'type' =>  Segment::class,
                        'options' => [
                            'route' => '/mobilepay[/:action][/id/:id]',
                            'constraints' => [
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*'
                            ],
                            'defaults' => [
                                'controller' => MobilepayController::class,
                                'action' => 'index'
                            ]
                        ]
                    ],
                    'mobilepay' => [
                        'type' =>  Segment::class,
                        'options' => [
                            'route' => '/mobilepay[/:action]',
                            'constraints' => [
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*'
                            ],
                            'defaults' => [
                                'controller' => MobilepayController::class,
                                'action' => 'index'
                            ]
                        ]
                    ]
                    
                ]
            ]
        ]
    ],
    
    'view_manager' => [
        'display_not_found_reason' => true,
        'display_exceptions' => true,
        'doctype' => 'HTML5',
        'not_found_template' => 'error/404',
        'exception_template' => 'error/index',
        'template_map' => [
            'layout/layout' => __DIR__ . '/../view/layout/layout.phtml',
            //'appointments/appointments/addpersondetails' => __DIR__ . '/../view/appointments/appointments/addpersondetails.phtml',
            // 'appointments/provider/addproviderservices' => __DIR__ . '/../view/appointments/provider/addproviderservices.phtml',
          //  'error/404' => __DIR__ . '/../view/error/404.phtml',
           // 'error/index' => __DIR__ . '/../view/error/index.phtml'
        ],
        'template_path_stack' => [
            __DIR__ . '/../view'
        ],
        'strategies' => [
            'ViewJsonStrategy'
        ]
    ],
    'view_helpers' => [
        'invokables' => [
            'translate' => \Zend\I18n\View\Helper\Translate::class
        ]
    ]
];
