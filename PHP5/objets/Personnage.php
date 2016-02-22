<?php

class Personnage {
    
    /*déclaration de constantes statiques*/
    const PV_MAX = 100;
    const ATK_MAX = 100;
    
    private $pv;
    private $nom;
    private $atk;
    
    public function __construct($nom = null, $pv = null, $atk = null){
        $this->nom = isset($nom) ? $nom : "Personnage";
        $this->setPv( $pv );
        $this->setAtk( $atk );
    }
    
    public function attaquer($personnage){
        if(isset($personnage)){
            $personnage->diminuerPv($this->atk);
            /*$personnage->setPv($personnage->getPv() - $this->atk);*/
        }
    }
    
    private function diminuerPv($pv = 0){
        $this->pv -= $pv;
    }
    
    public function getNom(){
        return $this->nom;
    }
    
    public function setNom($nom){
        $this->nom = $nom;
    }
    
    public function getPv(){
        return $this->pv;
    }
    
    public function setPv($pv){
        if(is_numeric($pv) && $pv > 0){
            $this->pv = ($pv > self::PV_MAX) ? self::PV_MAX : $pv;
        }
    }
    
    public function getAtk(){
        return $this->atk;
    }
    
    public function setAtk($atk){
        if(is_numeric($atk) && $atk > 0){
            $this->atk = ($atk > self::ATK_MAX) ? self::ATK_MAX: $atk;
        }
    }
    
}