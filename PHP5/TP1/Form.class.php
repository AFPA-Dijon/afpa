<?php

require_once 'Validator.class.php';

class Form {
    protected $data;
    protected $errors;
    
    public function __construct($data = array()){
        $this->data = $data;
        $this->errors = array();
    }
    
    public function valid(){
        var_dump($this->data);
        
        foreach ($this->data as $key => $field){
            
            if($key == 'email'){
                $this->errors[$key] = Validator::validEmail($field);
            }
            elseif($key == 'phone'){
                $this->errors[$key] = Validator::validPhone($field);
            }
            elseif($key == 'name'){
                $this->errors[$key] = Validator::validUserName($field);
            }
            elseif($key == 'password'){
                $this->errors[$key] = Validator::validPassword($field);
            }
        }
        
        
    }
    
    public function getErrorHTML($errorMsg){
        return "<p style = \"color:red;\"> $errorMsg </p>";
    }
    
    public function errors(){
        return $this->errors;
    }
    
    public function openForm($action, $method){
        return '<form action = "'.$action.'" method = "'.$method.'">';
    }
    
    public function closeForm(){
        return '</form>';
    }
    
    public function openFieldSet($legend = ''){
        $legend = !empty($legend)? '<legend>'.$legend.'</legend>': '';
        return '<fieldset>'.$legend;
    }

    public function closeFieldSet(){
        return '</fieldset>';
    }
    
    public function inputText($label, $name, $type){
        $errorMsg = $this->errors[$name];
        $html = '<label for="'.$name.'">'.$label.'</label><br /><input value = "'.$this->data[$name].'"type = "'.$type.'" name = "'.$name.'"/><br />';
        $html .= !empty($errorMsg) ? $this->getErrorHTML($errorMsg) : "";
        return $html;
    }
    
    public function inputSelect($label, $name, $options = array()){
        $retour = '<label for="'.$name.'">'.$label.'</label><br /><select name = "'.$name.'">';
        foreach ($options as $key => $value) {
            $retour .= '<option value = "'.$key.'">'.$value.'</option>';
        }
        $retour .= '</select><br />';
        return $retour;
    }
    
    public function submit($text = "Submit"){
        return '<input type = "submit" value = "'.$text.'">';
    }
}