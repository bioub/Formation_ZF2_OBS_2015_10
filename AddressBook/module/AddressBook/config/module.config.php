<?php

return array(
    'view_manager' => array(
        'not_found_template' => 'error/404',
        'exception_template' => 'error/index',
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
    'controllers' => array(
        // new AddressBook\Controller\ContactController();
        'invokables' => array(
            'AddressBook\Controller\Contact' => AddressBook\Controller\ContactController::class,
        ),
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
