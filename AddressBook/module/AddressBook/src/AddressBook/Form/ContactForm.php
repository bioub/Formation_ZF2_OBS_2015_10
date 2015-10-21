<?php

namespace AddressBook\Form;

class ContactForm extends \Zend\Form\Form
{

    public function __construct($em)
    {
        parent::__construct('contact');

        $element = new \Zend\Form\Element\Text('prenom');
        $element->setLabel('Prénom');
        $this->add($element);

        $element = new \Zend\Form\Element\Text('nom');
        $element->setLabel('Nom');
        $this->add($element);

        $element = new \Zend\Form\Element\Email('email');
        $element->setLabel('Email');
        $this->add($element);

        $element = new \Zend\Form\Element\Text('telephone');
        $element->setLabel('Téléphone');
        $this->add($element);

        $this->add(
                array(
                    'type' => 'DoctrineModule\Form\Element\ObjectSelect',
                    'name' => 'societe',
                    'options' => array(
                        'label' => 'Société',
                        'object_manager' => $em,
                        'target_class' => \AddressBook\Entity\Societe::class,
                        'property' => 'nom',
                        'display_empty_item' => true,
                        'empty_item_label' => '-- Pas de société --',
                    ),
                )
        );

//        $element = new \Zend\Form\Element\Submit('submit');
//        $element->setValue('Ajouter');
//        $this->add($element);
    }

}
