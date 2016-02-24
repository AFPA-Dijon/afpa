<?php

namespace Model\Classes;
use \Model\Personnage;
/**
 * Class Magicien: c'est un personnage spécialisé
*/

class Magicien extends Personnage {
    
    /*Dégâts d'attaque magique*/
    private $atkm;
    
    public static $variable;
    
    public function __construct($nom, $pv = null, $atk = null, $atkm = null){
        parent::__construct($nom, $pv, $atk);
        $this->atkm = $atkm;
    }
    
    /**
     * Attaque magique sur un autre Personnage
     * @param Personnage à attaquer
    */
    public function attaquer($personnage){
        if(isset($personnage)){
            $personnage->diminuerPv($this->atkm);
            /*$personnage->setPv($personnage->getPv() - $this->atk);*/
        }
    }
    
    public static function fonctionStatique(){
        
    }
}