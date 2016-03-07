<?php

//exemple de pagination avec données associées
//ex dans AnnoncesController

public function index()
{
    //options de paginate:
    //par ex pour charger les données associées, limiter a 10 resultats par page, 
    //et trier par libelle du Type, plus ajout de conditions (ex where Bien.ville = Dijon, Annonce.prix < 1000)
    $this->paginate = [
        'contain' => ['Biens', 'Type']
        'conditions' => ['Bien.ville' => 'Dijon', 'Annonce.prix <' => 1000],
        'limit' => 10,
        'order' => [
            'Type.libelle' => 'asc'
        ]
    ];

    $this->set('annonces', $this->paginate($this->Articles));
    //on peut passer directement la table à la methode paginate,
    
    //EDIT: on peut aussi passer une Query à paginate()
    //autrement dit si votre requete était déja prete (misteryes), vous pouvez l'utiliser avec...
    //ex si tu veux filtrer: (sans utiliser l'option 'conditions')
    $this->set('annonces', $this->paginate(
    $this->Annonces
        ->find()
        ->matching('Biens', function($q) use ($nomVilleFiltre) {
            return $q->where([
                'Biens.ville' => $nomVilleFiltre
            ]);
        })
        ->group(['Disciplines.id'])
    ));
    //les deux façons de faire sont valables...:
    //SOURCE: http://stackoverflow.com/questions/29737422/conditions-to-paginate-for-belongstomany-cakephp-3
    
    //le find et le contain sont faits automatiquement en fonction des options de paginate définies plus haut
    //et du coté de la vue vous récupérez un objet Query à itérer pour récupérer les résultats
}

//du coté de la vue, faites un debug($annonces->toArray());

//ex de ce que ça donne pour les Bookmarks: 
//http://reithh-reithh.c9users.io/Caketest/bookmarks?sort=Bookmarks.id&direction=desc