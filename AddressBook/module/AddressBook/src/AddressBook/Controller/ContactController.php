<?php

namespace AddressBook\Controller;

use Zend\Mvc\Controller\AbstractActionController;

class ContactController extends AbstractActionController
{

    public function listAction()
    {
        $adapter = new \Zend\Db\Adapter\Adapter(array(
            'driver' => 'Pdo_mysql',
            'host' => 'localhost',
            'database' => 'address_book',
            'username' => 'root',
            'password' => '',
            'charset' => 'UTF8'
        ));

        $gateway = new \Zend\Db\TableGateway\TableGateway('contact', $adapter);
        $mapper = new \AddressBook\Mapper\ContactZendDbMapper($gateway);
        $service = new \AddressBook\Service\ContactZendDbService($mapper);
        
        $listeContacts = $service->findAll();
    }

    public function addAction()
    {
        
    }

}
