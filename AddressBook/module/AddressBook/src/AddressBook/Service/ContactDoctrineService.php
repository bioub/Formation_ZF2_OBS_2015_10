<?php

namespace AddressBook\Service;

class ContactDoctrineService implements ContactServiceInterface
{

    /**
     *
     * @var \Doctrine\ORM\EntityManager
     */
    protected $em;

    public function __construct(\Doctrine\ORM\EntityManager $em)
    {
        $this->em = $em;
    }
    
    protected function getRepository() {
        return $this->em->getRepository(\AddressBook\Entity\Contact::class);
    }

    public function findAll()
    {
        $repo = $this->getRepository();
        return $repo->findAll();
    }

    public function find($id)
    {
        $repo = $this->getRepository();
        return $repo->find($id);
    }
}
