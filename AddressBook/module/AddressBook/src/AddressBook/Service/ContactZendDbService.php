<?php

namespace AddressBook\Service;

class ContactZendDbService implements ContactServiceInterface
{

    /**
     *
     * @var \AddressBook\Mapper\ContactZendDbMapper
     */
    protected $mapper;

    public function __construct(\AddressBook\Mapper\ContactZendDbMapper $mapper)
    {
        $this->mapper = $mapper;
    }

    /**
     * Retourne un tableau d'object Entity\Contact
     */
    public function findAll()
    {
        return $this->mapper->findAll();
    }

}
