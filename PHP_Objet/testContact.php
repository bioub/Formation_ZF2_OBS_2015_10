<?php

use Orange\Entity\Contact;
use Orange\Entity\Societe;

//require 'src/Entity/Contact.php';
//require 'src/Entity/Societe.php';
require 'vendor/autoload.php';

$romain = new Contact();

$romain->setPrenom('Romain')
       ->setNom('Bohdanowicz');

$agoratic = new Societe();
$agoratic->setNom('Agoratic');
$agoratic->setVille('Paris');

$romain->setSociete($agoratic); // association

echo $romain->getNomComplet(); // Romain Bohdanowicz

$sm = include './includes/services_test.php';

$logger = $sm->get('Orange\Logger');
$logger->debug('Coucou');

