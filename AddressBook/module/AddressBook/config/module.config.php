<?php

return array(
    'view_manager' => array(
        'not_found_template' => 'error/404',
        'exception_template' => 'error/index',
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
    'service_manager' => array(
        'invokables' => array(),
        'factories' => array(
            'Zend\Db\Adapter\Adapter' => \Zend\Db\Adapter\AdapterServiceFactory::class,
            'AddressBook\Gateway\Contact' => function($sm) {
                $adapter = $sm->get('Zend\Db\Adapter\Adapter');
                return new \Zend\Db\TableGateway\TableGateway('contact', $adapter);
            },
            'AddressBook\Mapper\Contact' => function($sm) {
                $gateway = $sm->get('AddressBook\Gateway\Contact');
                return new \AddressBook\Mapper\ContactZendDbMapper($gateway);
            },
            'AddressBook\Service\Contact' => function($sm) {
                $mapper = $sm->get('AddressBook\Mapper\Contact');
                return new AddressBook\Service\ContactZendDbService($mapper);
            }
        ),
    ),
    'controllers' => array(
        // new AddressBook\Controller\ContactController();
        'invokables' => array(
            // 'AddressBook\Controller\Contact' => AddressBook\Controller\ContactController::class,
        ),
        'factories' => array(
            'AddressBook\Controller\Contact' => function($cm) {
                $sm = $cm->getServiceLocator();
                $service = $sm->get('AddressBook\Service\Contact');
                return new AddressBook\Controller\ContactController($service);
            },
        )
    ),
    'router' => array(
        'routes' => array(
            'contact' => array(
                'type' => Zend\Mvc\Router\Http\Literal::class,
                'options' => array(
                    'route' => '/contacts',
                    'defaults' => array(
                        'controller' => 'AddressBook\Controller\Contact',
                        'action' => 'list'
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'add' => array(
                        'type' => Zend\Mvc\Router\Http\Literal::class,
                        'options' => array(
                            'route' => '/ajouter',
                            'defaults' => array(
                                'controller' => 'AddressBook\Controller\Contact',
                                'action' => 'add'
                            ),
                        ),
                    ),
                )
            ),
        ),
    ),
);
