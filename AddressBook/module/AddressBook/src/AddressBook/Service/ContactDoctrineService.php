<?php

namespace AddressBook\Service;

class ContactDoctrineService implements ContactServiceInterface
{

    /**
     *
     * @var \Doctrine\ORM\EntityManager
     */
    protected $em;
    
    /**
     *
     * @var \AddressBook\Form\ContactForm
     */
    protected $form;

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
    
    public function insert($data) {
        $contact = new \AddressBook\Entity\Contact();
        $hydrator = new \DoctrineModule\Stdlib\Hydrator\DoctrineObject($this->em);  
        $inputFilter = new \AddressBook\InputFilter\ContactInputFilter($this->em);
        
        $this->form->setInputFilter($inputFilter);
        $this->form->setData($data);
        
        if ($this->form->isValid()) {
            $hydrator->hydrate((array) $data, $contact);
        
            $this->em->persist($contact);
            $this->em->flush();
            
            return true;
        }
        
        return false;
    }
    
    public function createForm() {
        // TODO à ajouter au service manager
        $this->form = new \AddressBook\Form\ContactForm($this->em);
        
        return $this->form;
    }
}
