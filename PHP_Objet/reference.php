<?php

$s1 = 'Jean';
$s2 = $s1;
$s2 = 'Eric';
echo $s1; // Jean

require 'src/Entity/Contact.php';

$o1 = new Orange\Entity\Contact();
$o1->setPrenom('Jean');
$o2 = $o1;
$o2->setPrenom('Eric');
echo $o1->getPrenom(); // Eric