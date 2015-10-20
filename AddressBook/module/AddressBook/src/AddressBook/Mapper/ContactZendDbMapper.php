<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AddressBook\Mapper;

/**
 * Description of ContactZendDbMapper
 *
 * @author romain
 */
class ContactZendDbMapper
{

    /**
     *
     * @var \Zend\Db\TableGateway\TableGateway
     */
    protected $gateway;

    public function __construct(\Zend\Db\TableGateway\TableGateway $gateway)
    {
        $this->gateway = $gateway;
    }

    public function findAll()
    {
        $rs = $this->gateway->select(); // TODO ajouter une clause LIMIT
        
        $tabContacts = $rs->toArray();
        $contacts = array();
        
        $hydrator = new \Zend\Hydrator\ClassMethods();
                
        
        foreach ($tabContacts as $contactAssoc) {
            $contact = new \AddressBook\Entity\Contact();
            $hydrator->hydrate($contactAssoc, $contact);
            
//            $contact->setId($contactAssoc['id'])
//                    ->setPrenom($contactAssoc['prenom'])
//                    ->setNom($contactAssoc['nom'])
//                    ->setEmail($contactAssoc['email'])
//                    ->setTelephone($contactAssoc['telephone']);
            
            $contacts[] = $contact;
        }
        
        return $contacts;
    }
}
