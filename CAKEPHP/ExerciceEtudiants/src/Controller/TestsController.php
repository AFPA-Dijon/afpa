<?php

namespace App\Controller;

use App\Controller\AppController;
use App\Model\Entity\Test;

class TestsController extends AppController {
    
    public function index(){
        $tests = $this->Tests->find()->contain(['Subjects']);
        
        $this->set('tests', $tests);
    }
    
    public function add(){
        $test = $this->Tests->newEntity();
        $matieres = $this->Tests->Subjects->find('list', ['keyField' => 'id', 'valueField' => 'codemat'])->toArray();
        
        if($this->request->isPost()){
            $test = $this->Tests->patchEntity($test, $this->request->data);
            
            if($this->Tests->save($test)){
                $this->Flash->success('L\'examen a bien été créée');
                return $this->redirect('/tests/index');
            }
            else{
                $this->Flash->error('Erreur lors de la création de l\'examen  ');
            }
        }
        $this->set('test', $test);
        $this->set('matieres', $matieres);
    }
}