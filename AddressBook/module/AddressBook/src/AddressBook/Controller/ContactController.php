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
        $listeContacts = $this->service->findAll();

        return new ViewModel(array(
            'contacts' => $listeContacts
        ));
    }
    
    public function showAction()
    {
        // Récupère l'id dans l'URL
        $id = $this->params('id');
        
        // On interroge le model
        $contact = $this->service->find($id);
        
        // Erreur 404 si pas de contact dans la BDD
        if (!$contact) {
            return $this->notFoundAction();
        }
        
        // On transmet à la vue
        return new ViewModel(array(
           'contact' => $contact 
        ));
    }

    public function addAction()
    {
        // TODO à ajouter au service manager
        // OU ALORS créer une méthode createForm dans le
        // service
        $form = new \AddressBook\Form\ContactForm();
        
        return new ViewModel(array(
            'contactForm' => $form->prepare()
        )); 
    }

}
