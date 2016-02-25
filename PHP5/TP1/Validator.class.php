<?php

class Validator {
    
    const MSG_INVALID_EMAIL = "Email invalide";
    const MSG_INVALID_PHONE = "Numero de tel invalide";
    const MSG_INVALID_USERNAME = "Nom d'utilisateur invalide";
    const MSG_INVALID_PASSWORD = "Mot de passe invalide";
    
    const REGEX_EMAIL = "#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,}$#";
    const REGEX_PHONE = "#^0[1-8][0-9]{8}$#";
    const REGEX_USERNAME = "#^[a-zA-Z0-9]+$#";
    const REGEX_PASSWORD = "#^[a-zA-Z0-9]+$#";
    
    
    public static function validEmail($email){
        return preg_match(self::REGEX_EMAIL, $email) ? "" : self::MSG_INVALID_EMAIL;
    }
    
    public static function validPhone($phone){
        return preg_match(self::REGEX_PHONE, $phone)? "" : self::MSG_INVALID_PHONE;
    }
    
    public static function validUserName($name){
        return preg_match(self::REGEX_USERNAME, $name)? "" : self::MSG_INVALID_USERNAME;
    }
    
    public static function validPassword($password){
        return preg_match(self::REGEX_PASSWORD, $password)? "" : self::MSG_INVALID_PASSWORD;
    }
    
    
    
}