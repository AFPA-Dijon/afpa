<?php
require_once 'Form.class.php';

class MaterialForm extends Form {
    
    
    public function __construct($data = array()){
        parent::__construct($data);
    }
    
    
    public function openForm($action, $method, $columns){
        return $this->prefix( parent::openForm($action, $method), $columns );
    }
    
    public function closeForm(){
        return $this->suffix( parent::closeForm() );
    }
    
    public function inputText($label, $name, $type){
        $errorMsg = $this->errors[$name];
        $html = '<input id="'.$name.'" name="'.$name.'" type="'.$type.'" class="validate">
                 <label for="'.$name.'"> '.$label.'</label>';
        $html = $this->surround($html);
        $html .= !empty($errorMsg) ? $this->getErrorHTML($errorMsg) : "";
        return $html;
    }
    
    private function prefix($html, $columns){
        return '<div class="row"><div class="col s'.$columns.'">'.$html;
    }
    
    private function suffix($html){
       return $html.'</div></div>';
    }
    
    private function surround($html){
       return '<div class = "row"><div class = "input-field">'.$html.'</div></div>';
    }
    
    public function submit($text = 'Submit'){
      return '<button class="btn waves-effect waves-light" type="submit">'.$text.'
                <i class="material-icons right">send</i>
              </button>';
    }
    
    
}