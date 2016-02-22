<?php
require_once 'Personnage.php';

$sami = new Personnage("Sami", 100, 20);
$tatane = new Personnage("Jonathan", 100, 30);
var_dump($sami);

$sami->attaquer($tatane);
echo $tatane->getPv();