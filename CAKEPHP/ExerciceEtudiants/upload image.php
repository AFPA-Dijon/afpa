<?php

//ajouter un champ de selection de fichier dans un formulaire: 
echo $this->Form->create($bien, ['type' => 'file']) 
...
echo $this->Form->file('lien'); 


//Du coté du controller:
if ($this->request->is('post')) {
	$file = $this->request->data['lien'];
	//pour enregistrer le fichier dans le dossier webroot/img sur le serveur:
	move_uploaded_file($file['tmp_name'], WWW_ROOT . '/img/' . $file['name']);
	
	//ne stocker que le $file['name'] dans l'entité, c'est lui qui va servir
	//au chargement de l'image avec le Html helper dans les vues
}


//Du coté de la vue ou on veut afficher l'image:
echo $this->Form->file('monImage.jpg'); 
//(pas besoin de donner le chemin complet si elle se trouve bien dans webroot/img)