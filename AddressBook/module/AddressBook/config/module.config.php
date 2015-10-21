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
            'AddressBook\Service\ContactZendDb' => function($sm) {
                $mapper = $sm->get('AddressBook\Mapper\Contact');
                return new AddressBook\Service\ContactZendDbService($mapper);
            },
            'AddressBook\Service\ContactDoctrine' => function($sm) {
                $em = $sm->get('Doctrine\ORM\EntityManager');
                return new \AddressBook\Service\ContactDoctrineService($em); 
            },        
        ),
        'aliases' => array(
            'AddressBook\Service\Contact' => 'AddressBook\Service\ContactDoctrine'
        )
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
                    'show' => array(
                        'type' => Zend\Mvc\Router\Http\Segment::class,
                        'options' => array(
                            'route' => '/:id',
                            'defaults' => array(
                                'controller' => 'AddressBook\Controller\Contact',
                                'action' => 'show'
                            ),
                            'constraints' => array(
                                'id' => '[1-9][0-9]*'
                            )
                        ),
                    ),
                )
            ),
        ),
    ),
    'doctrine' => array(
        'driver' => array(
            // defines an annotation driver with two paths, and names it `my_annotation_driver`
            'my_annotation_driver' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(
                    __DIR__ . '/../src/AddressBook/Entity'
                ),
            ),

            // default metadata driver, aggregates all other drivers into a single one.
            // Override `orm_default` only if you know what you're doing
            'orm_default' => array(
                'drivers' => array(
                    // register `my_annotation_driver` for any entity under namespace `My\Namespace`
                    'AddressBook\Entity' => 'my_annotation_driver'
                )
            )
        )
    )
);
