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
            //'database' => 'address_book',
            'username' => 'root',
            'password' => '',
            'charset' => 'UTF8'
        ));

        $result = $adapter->query("SHOW DATABASES")->execute();
        
        while ($row = $result->next())
        {
            var_dump($row["Database"]);
        }
    }

    public function addAction()
    {
        
    }

}
