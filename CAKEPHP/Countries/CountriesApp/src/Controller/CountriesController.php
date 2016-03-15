<?php

namespace App\Controller;

use Cake\Core\Configure;


class CountriesController extends AppController {
    
    
    /*Liste des monarchies avec la plus grande population*/
    public function question1(){
        $this->paginate = [
            'limit' => 10
        ];
        $biggestMonarchies = $this->Countries->find('biggestMonarchies');
        $biggestMonarchies = $this->paginate($biggestMonarchies);
        $this->set(compact('biggestMonarchies'));
    }
    
    /*Liste des républiques*/
    public function question2(){
        $this->paginate = [
            'limit' => 10
        ];
        $republics = $this->Countries->find('republics');
        $republics = $this->paginate($republics);
        $this->set(compact('republics'));
    }
    
    /*Espérance de vie dans le monde*/
    public function question3(){
        $life = $this->Countries->find('worldLifeExpectancy')->first();
        $this->set(compact('life'));
    }
    
    /*Republiques triées par espérance de vie*/
    public function question4(){
        $this->paginate = [
            'limit' => 10
        ];
        $republics = $this->Countries->find('republicsHighLifeExpectancy', ['expectancy' => 70]);
        $republics = $this->paginate($republics);
        $this->set(compact('republics'));
    }
    
    /*Pays dont la langue officielle est l'arabe*/
    public function question5(){
        $this->paginate = [
            'limit' => 10
        ];
        $countries = $this->Countries->find('countriesWithOfficialLanguage', ['language' => 'Arabic']);
        debug($countries->toArray());
        $countries = $this->paginate($countries);
        $this->set(compact('countries'));
    }
    
    /*Recherche de pays par langue officielle*/
    public function question6(){
        $officialLanguages = $this->Countries->Languages
          ->find(
            'list', 
            [
                'keyField' => 'language', 
                'valueField' => 'language'
            ])
        ->find('officialLanguages')->toArray();
        
        if($this->request->isPost()){
            $data = $this->request->data;
            $countries = $this->Countries->find('countriesWithOfficialLanguage', ['language' => $data['language']]);
            $this->set(compact('countries'));
        }
        $this->set(compact('officialLanguages'));
    }
    
    /*Villes dont la pop est supérieure à celle du Danemark*/
    public function question7(){
        $cities = $this->Countries->Cities->find('citiesBiggerThanDanemark');
        $this->set(compact('cities'));
    }
    
    /*Trouver les pays dont la langue recherchée est parlée par au moins X % de la pop.*/
    public function question8(){
        $officialLanguages = $this->Countries->Languages
          ->find(
            'list', 
            [
                'keyField' => 'language', 
                'valueField' => 'language'
            ])
        ->find('officialLanguages')->toArray();
        
        if($this->request->isPost()){
            $data =$this->request->data;
            $countries = $this->Countries->find('countriesWithProbability', ['percentage' => $data['percentage'], 'language' => $data['language']]);
            $this->set(compact('countries'));
        }
            
        
        
         $this->set(compact('officialLanguages'));
        
    }
}