<?php
namespace App\Controller;
use Cake\ORM\TableRegistry;
use Cake\I18n\FrozenDate;

class AnnoncesController extends AppController {
    public $categories = ['location' => 'Location', 'vente' => 'Vente'];
    
    public function add(){
        $annonce = $this->Annonces->newEntity();
        $biens = $this->Annonces->Biens->find('list')->where(['user_id' => $this->Auth->user('id')])->toArray();
        
        if($this->request->isPost()){
            $data = $this->request->data;
            $date = new FrozenDate();
            $data['datedeparution'] = $date;
            $data['user_id'] = $this->Auth->user('id');
            $annonce = $this->Annonces->patchEntity($annonce, $data);
            
            $userBiens = $this->Annonces->Biens->find()->where(['user_id' => $data['user_id']])->first();
            /*si le bien spécifié dans le formulaire appartient à l'utilisateur connecté*/
            if($userBiens && $this->Annonces->save($annonce)){
                $this->Flash->success('L\'annonce no '.$annonce->id. ' a bien été publiée');
                return $this->redirect('/annonces/index');
            } else {
                $this->Flash->error('Erreur lors de la publication de l\'annonce');
            }
        }
        $this->set('categories',$this->categories);
        $this->set(compact('annonce'));
        $this->set(compact('biens'));
    }
    
    public function view($id = null){
        $annonce = $this->Annonces->get($id, ['contain' => 'Biens.Images']);
        $this->set(compact('annonce'));
    }
    
    public function index(){
        
        $annonces = $this->Annonces->find('all', ['contain' => 'Biens']);
        $villes = $this->Annonces->Biens->find('list', ['keyField' => 'ville', 'valueField' => 'ville'])->toArray();
        $types = $this->Annonces->Biens->Types->find('list');
        
        if($this->request->isPost()){
            $data = $this->request->data;
            
            if(!empty($data['categorie'] && array_key_exists($data['categorie'], $this->categories)) ){
                $annonces->where(['categorie' => $data['categorie']]);
            }
            
            if(!empty($data['ville'])){
                $annonces->where(['ville' => $data['ville']]);
            }
            
            if(!empty($data['nombredepieces'])){
                $annonces->where(['nombredepieces' => $data['nombredepieces']]);
            }
            
            if(!empty($data['type_id'])){
                $annonces->matching('Biens', function ($q) use ($data) {
                    return $q->where(['Biens.type_id' => $data['type_id']]);
                });
            }
            
            if(!empty($data['prixmin']) || !empty($data['prixmax']) ){
                
                 $prixmin = !empty($data['prixmin'])? $data['prixmin']: 0;
                 
                if( (!empty($data['prixmin']) && !empty($data['prixmax'])) || (empty($data['prixmin']) && !empty($data['prixmax']))){
                    $annonces->where(function($q) use($data, $prixmin) {
                        return $q->between( 'prix',$prixmin, $data['prixmax'] );
                    }); 
                } elseif(!empty($data['prixmin']) && empty($data['prixmax'])) {
                    $annonces->where(function($q) use($data, $prixmin) {
                        return $q->gte('prix',$prixmin);
                    });
                } 
            }
            $annonces->order(['prix' => 'ASC']);
            
            if(!empty($data['datedeparution'])){
               //echo($data['datedeparution']);
                $annonces->where(['Annonces.datedeparution >' => (strtotime($data['datedeparution']))]);
            }
            debug($annonces->sql());
            
        }
        
        $this->set('villes',$villes);
        $this->set('types',$types);
        $this->set('categories',$this->categories);
        $this->set(compact('annonces'));
    }
}
    
    