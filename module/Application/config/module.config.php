<?php

declare(strict_types=1);

namespace Application;

use Laminas\Router\Http\Literal;
use Laminas\Router\Http\Segment;
use Laminas\ServiceManager\Factory\InvokableFactory;

return [
    'router' => [
        'routes' => [
            'home' => [
                'type'    => Literal::class,
                'options' => [
                    'route'    => '/',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'application' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/application[/:action]',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'driver' => [
                'type' => 'segment',
                'options' => [
                    'route' => '/driver[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => Controller\DriverController::class,
                        'action' => 'index',
                    ],
                ],
            ],
            'vehicle' => [
                'type' => 'segment',
                'options' => [
                    'route' => '/vehicle[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => Controller\VehicleController::class,
                        'action' => 'index',
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\IndexController::class => InvokableFactory::class,
            Controller\VehicleController::class => Factory\VehicleControllerFactory::class,
            Controller\DriverController::class => Factory\DriverControllerFactory::class,
        ],
    ],
    'service_manager' => [
        'factories' => [
            // \Doctrine\ORM\EntityManager::class => \DoctrineORMModule\Service\EntityManagerFactory::class,

            \Doctrine\ORM\Configuration::class => function ($container) {
                $config = new \Doctrine\ORM\Configuration();

                $annotationDriver = new \Doctrine\ORM\Mapping\Driver\AnnotationDriver(new \Doctrine\Common\Annotations\AnnotationReader(), [__DIR__ . '/src/Entity']);
                $config->setMetadataDriverImpl($annotationDriver);

                $config->setProxyDir(__DIR__ . '/../data/doctrine-proxies');
                $config->setProxyNamespace('Doctrine\ORM\Proxy');

                return $config;
            },

            \Doctrine\ORM\EntityManager::class => function ($container) {
                $config = $container->get(\Doctrine\ORM\Configuration::class);
                $connection = $container->get(\Doctrine\DBAL\Connection::class);
                return \Doctrine\ORM\EntityManager::create($connection, $config);
            },

            \Doctrine\DBAL\Connection::class => function ($container) {
                $params = [
                    'dbname' => 'docker',
                    'user' => 'root',
                    'password' => 'root',
                    'host' => 'database',
                    'driver' => 'pdo_mysql',
                ];

                return \Doctrine\DBAL\DriverManager::getConnection($params);
            },

            Service\VehicleService::class => Factory\VehicleServiceFactory::class,
            Service\DriverService::class => Factory\DriverServiceFactory::class,
        ],
    ],
    'view_manager' => [
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => [
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],

    'doctrine' => [
        // 'connection' => [
        //     'orm_default' => [
        //         'driverClass' => \Doctrine\DBAL\Driver\PDO\MySql\Driver::class,
        //         'params' => [
        //             'host' => 'database',
        //             'user' => 'root',
        //             'password' => 'root',
        //             'dbname' => 'docker',
        //         ],
        //     ],
        // ],
        // 'driver' => [
        //     'application_entities' => [
        //         'class' => \Doctrine\ORM\Mapping\Driver\AnnotationDriver::class,
        //         'cache' => 'array',
        //         'paths' => [__DIR__ . '/../src/Entity'],
        //     ],
        //     'orm_default' => [
        //         'drivers' => [
        //             'Application\Entity' => 'application_entities'
        //         ],
        //     ],
        // ],
    ],
];
