<?php

namespace Orange\Entity;

class Contact
{

    // Variables
    // Toujours protected ou private
    // On les appelle des :
    // - propriétés (property)
    // - attributs (attributes)
    // - champs (fields)
    protected $id;
    protected $prenom;
    protected $nom;
    protected $email;
    protected $telephone;

    /**
     *
     * @var Societe
     */
    protected $societe;

    // Fonctions
    // On les appelle des méthodes
    public function getId()
    {
        return $this->id;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getTelephone()
    {
        return $this->telephone;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
        return $this;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
        return $this;
    }

    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;
        return $this;
    }

    public function getSociete()
    {
        return $this->societe;
    }

    public function setSociete(Societe $societe)
    {
        $this->societe = $societe;
        return $this;
    }

    public function getNomComplet()
    {
        return "$this->prenom $this->nom";
    }

}
