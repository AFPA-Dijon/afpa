<?php

namespace App\Controller;


use App\Controller\AppController;
use Cake\ORM\TableRegistry;

class StudentsController extends AppController {
    
    /*affiche la liste des utilisateurs*/
     public function index(){
        $this->paginate = [
            'limit' => 5,
            'order' => [
                'Students.nom' => 'asc',
                'Students.prenom' => 'asc'
            ]
        ]; 
        $this->set('students', $this->paginate($this->Students));
    }
    
    /*affiche les details d'un etudiant, ses notes et sa moyenne*/
    public function view($id){
        $this->paginate = [
            'limit'=> 10, 
            'order' => ['datepreuve' => 'desc']
        ];
        $student = $this->Students->get($id);
        $studentTests = TableRegistry::get('StudentsTests');
        $query = $studentTests->find('participationsForStudent', ['student_id' => $id]);
        $moyenne = $this->calculMoyenne($query->toArray());
        
        $this->set('participations', $this->paginate($query));
        $this->set(compact('student'));
        $this->set(compact('moyenne'));
    }
    
    /*helper pour view() calcul de la moyenne d'un étudiant pondérée par les coefficients des matières*/
    private function calculMoyenne(array $participations){
        $sumNoteCoeffs = 0;
        $sumCoeffs = 0;
        foreach ($participations as $participation) {
            $sumNoteCoeffs += $participation['note'] * $participation['test']['subject']['coeff'];
            $sumCoeffs += $participation['test']['subject']['coeff'];
        }
        return $sumNoteCoeffs / $sumCoeffs;
    }
    
    public function add(){
        
        $student = $this->Students->newEntity();
        if ($this->request->is('post')) {
            
            $data = $this->request->data;
            
            $data['file'] = $data['image'];
            
            $data['image'] = 'students/' . $data['image']['name'];
            
            $student = $this->Students->patchEntity($student, $data);
           /*  
             if(isset($student->errors()['file'])){
                 $student->errors()['image'] = $student->errors()['file'];
                 debug( $student->errors());die;
             }*/
            if ($this->Students->save($student)) {
                move_uploaded_file( $data['file']['tmp_name'], 
                WWW_ROOT . '/img/students/' .  $data['file']['name']);

                $this->Flash->success(__('L etudiant a bien été enregistré.'));
                return $this->redirect('/students/index');
                
            } else {
                $this->Flash->error(__('L\'étudiant na pas pu etre enregistré, veuillez rééssayer.'));
            }
        }
        $this->set('student', $student);
    }
}