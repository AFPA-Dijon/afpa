<div class="content">
    <h4>Adresse</h4>
    <p><?= $bien->adresse ?></p>
     <h4>Ville</h4>
    <p><?= $bien->ville ?></p> 
    <h4>Description</h4>
    <p><?= $bien->description ?></p>
    <h4>Type</h4>
    <p><?= $bien->has('type') ? $bien->type->libelle : 'Inconnu' ?></p> 
    <h4>Nombre de pièces</h4>
    <p><?= $bien->nombredepieces ?></p>
    <h4>Photos</h4>
    <?php 
    if($bien->has('images') && !empty($bien->images)){
        foreach($bien->images as $image){
            echo $this->Html->image('biens/'.$image->lien);
        }
    }
    ?>
</div>