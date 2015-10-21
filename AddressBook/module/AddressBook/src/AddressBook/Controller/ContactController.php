<?php

namespace AddressBook\Controller;

use AddressBook\Service\ContactServiceInterface;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class ContactController extends AbstractActionController
{

    /**
     *
     * @var ContactServiceInterface
     */
    protected $service;

    public function __construct(ContactServiceInterface $service)
    {
        $this->service = $service;
    }

    public function listAction()
    {
//        $adapter = new \Zend\Db\Adapter\Adapter(array(
//            'driver' => 'Pdo_mysql',
//            'host' => 'localhost',
//            'database' => 'address_book',
//            'username' => 'root',
//            'password' => '',
//            'charset' => 'UTF8'
//        ));
//
//        $gateway = new \Zend\Db\TableGateway\TableGateway('contact', $adapter);
//        $mapper = new \AddressBook\Mapper\ContactZendDbMapper($gateway);
//        $service = new \AddressBook\Service\ContactZendDbService($mapper);

        $listeContacts = $this->service->findAll();

        return new ViewModel(array(
            'contacts' => $listeContacts
        ));
    }

    public function addAction()
    {
        
    }

}
