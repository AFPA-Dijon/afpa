<?php

class Form {
    private $data;
    
    public function __construct($data = array()){
        $this->data = $data;
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
    composer create-project --prefer-dist cakephp/app CakePHP_Test
    
    public function closeFieldSet(){
        return '</fieldset>';
    }
    
    public function inputText($label, $name, $type){
        return '<label for="'.$name.'">'.$label.'</label><br /><input value = "'.$this->data[$name].'"type = "'.$type.'" name = "'.$name.'"/><br />';
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