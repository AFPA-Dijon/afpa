<?php
require_once 'Model/Personnage.class.php';
require_once 'Magicien.class.php';

$sami = new Personnage("Sami", 100, 20);
$tatane = new Personnage("Jonathan", 100, 30);
var_dump($sami);
$sami->attaquer($tatane);
echo $tatane->getPv();
