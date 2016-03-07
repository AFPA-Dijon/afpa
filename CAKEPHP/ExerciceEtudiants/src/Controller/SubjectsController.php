<?php

namespace App\Controller;

use App\Controller\AppController;

class SubjectsController extends AppController {
    
    public function index(){
        $subjects = $this->Subjects->find();
        $this->set('subjects', $subjects);
    }
    
    public function add(){
        $subject = $this->Subjects->newEntity();
        
        if($this->request->isPost()){
            $subject = $this->Subjects->patchEntity($subject, $this->request->data);
            
            if($this->Subjects->save($subject)){
                $this->Flash->success('La matière ' . $subject->libelle . ' a bien été créée');
                return $this->redirect('/subjects/index');
            }
            else{
                $this->Flash->error('Erreur lors de la création de  ' . $subject->libelle);
            }
        }
        $this->set('subject', $subject);
    }
}