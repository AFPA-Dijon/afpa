<?php
namespace App\Controller;

use Cake\ORM\TableRegistry;

class BiensController extends AppController {
    
    
    public function view($id){
       
        $bien = $this->Biens
        ->findById($id)
        ->contain(['Types', 'Images'])
        ->first();
        
        $this->set(compact('bien'));
    }
    
    public function add (){
        $bien = $this->Biens->newEntity();
        $types = $this->Biens->Types->find('list')->toArray();
        
        if($this->request->isPost()){
            $data = $this->request->data;
            $data['user_id'] = $this->Auth->user('id');
            $bien = $this->Biens->patchEntity($bien, $data);
            $bien = $this->Biens->save($bien);
            if($bien){
                if( $this->validImages($bien->id) ){
                    $this->Flash->success('Le bien a  bien été sauvegardé');
                } else {
                    $bien = $this->Biens->delete($bien);
                    $this->Flash->error('Le bien n\'a pas pu etre sauvegardé');
                }
            }
            else {
                $this->Flash->error('Le bien n\'a pas pu etre sauvegardé');
            }
        }
        
        $this->set(compact('types'));
        $this->set(compact('bien'));
    }
    
    private function validImages($bienId){
        $images = TableRegistry::get('Images');
        $data['bien_id'] = $bienId;
        
        if(isset($this->request->data['image'])){
            foreach($this->request->data['image'] as $image){
                if(!empty($image['name'])){
                    $data['lien'] = $bienId . '/'. $image['name'];
                    $imageEntity = $images->newEntity($data);
                    $imageEntity = $images->save($imageEntity);
                    if($imageEntity){
                        $path = WWW_ROOT . 'img/biens/' . $bienId ;
                        @mkdir($path, 0777, true);
                        move_uploaded_file( $image['tmp_name'], $path . '/'. $image['name']);
                    }
                    else{
                        return false;
                    }
                }
            }
        }
        return true;
    }
    
}
