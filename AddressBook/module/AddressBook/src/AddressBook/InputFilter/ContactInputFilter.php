<?php

namespace AddressBook\InputFilter;

class ContactInputFilter extends \Zend\InputFilter\InputFilter
{

    public function __construct($em)
    {

        $input = new \Zend\InputFilter\Input('prenom');

        $filter = new \Zend\Filter\StringTrim();
        $input->getFilterChain()->attach($filter);

        $validator = new \Zend\Validator\StringLength();
        $validator->setMax(40);
        $input->getValidatorChain()->attach($validator);

        $validator = new \Zend\Validator\NotEmpty();
        $validator->setMessage('Le prénom est obligatoire', \Zend\Validator\NotEmpty::IS_EMPTY);
        $input->getValidatorChain()->attach($validator);

        $this->add($input);

        $input = new \Zend\InputFilter\Input('email');
        $input->setRequired(false);

        $validator = new \DoctrineModule\Validator\NoObjectExists(array(
            'object_repository' => $em->getRepository('AddressBook\Entity\Contact'),
            'fields' => 'email'
        ));
        $input->getValidatorChain()->attach($validator);
//        $validator->setMessage("Cet email existe déjà", \DoctrineModule\Validator\NoObjectExists::ERROR_NO_OBJECT_FOUND);
        $this->add($input);
    }

}
