<?php

/**
 * Class Magicien: c'est un personnage spécialisé
*/

class Magicien extends Personnage {
    
    /*Dégâts d'attaque magique*/
    private $atkm;
    
    public function __construct($nom, $pv = null, $atk = null, $atkm = null){
        parent::__construct($nom, $pv, $atk);
        $this->atkm = $atkm;
    }
    
    /**
     * Attaque magique
    */
    public function attaquer(){
        
    }
    
}