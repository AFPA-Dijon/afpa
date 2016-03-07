<?php

namespace App\Controller;

use App\Controller\AppController;

class StudentsTestsController extends AppController {
    
    public function index(){
        
         $this->paginate = [
            /*'contain' => [
                'Students'  => function ($q) {
                   return $q->select(['nom', 'prenom']);
                },
                'Tests.Subjects' => function ($q) {
                   return $q->select(['Tests.datepreuve', 'Tests.lieu', 'Subjects.codemat']);
                }
            ],*/
            'limit' => 2,
            'order' => [
                'Tests.datepreuve' => 'asc'
            ]
        ];
        
        /*$query =  $this->StudentsTests->find();
        $query->contain(
            [
                'Students'  => function ($q) {
                   return $q->select(['nom', 'prenom']);
                },
                'Tests.Subjects' => function ($q) {
                   return $q->select(['Tests.datepreuve', 'Tests.lieu', 'Subjects.codemat']);
                }
            ]
        );*/
        
        $query = $this->StudentsTests->find('participations');
        $this->set('studentsTests', $this->paginate($query));
    }
    
    public function add(){
        $studentTest = $this->StudentsTests->newEntity();
        $students = $this->StudentsTests->Students->find('list');
        $tests = $this->StudentsTests->Tests->find('list');
        
        if($this->request->isPost()){
            $data = $this->request->data;
            $studentTest = $this->StudentsTests->patchEntity($studentTest, $data);
            if($this->StudentsTests->save($studentTest)){
                $this->redirect('/studentsTests/index');
            }
        }
        
        
        $this->set(compact('studentTest'));
        $this->set(compact('students'));
        $this->set(compact('tests'));
    }
}