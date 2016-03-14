<?php
namespace App\Controller;



class TypesController extends AppController {
    
    
    public function add (){
        $type = $this->Types->newEntity();
        if($this->request->isPost()){
            $data = $this->request->data;
            $type = $this->Types->patchEntity($type, $data);
            if($this->Types->save($type)){
                $this->Flash->success('Le type a  bien été sauvegardé');
            }
            else {
                $this->Flash->error('Le type n\'a pas pu etre sauvegardé');
            }
        }
        
        $this->set(compact('type'));
    }
    
}
