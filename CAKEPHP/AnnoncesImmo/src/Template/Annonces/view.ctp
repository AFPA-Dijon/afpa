<div class="content">
    <div class="row">
        <?php $bien = $annonce->bien;?>
        <div class="columns medium-3">
            <h5>Adresse</h5>
            <p><?= $bien->adresse ?></p>
        </div>
        <div class="columns medium-3">
            <h5>Ville</h5>
            <p><?= $bien->ville ?></p> 
        </div>
        <div class="columns medium-3">
            <h5>Type</h5> 
            <p><?= $bien->has('type') ? $bien->type->libelle : 'Inconnu' ?></p> 
        </div>
        <div class="columns medium-3">
            <h5>Nombre de pièces</h5>
            <p><?= $bien->nombredepieces ?></p>
        </div>
    </div>
    <div class="row">
        <div class="columns medium-12">
             <h5>Description</h5>
             <p><?= $bien->description ?></p>
        </div>
    </div>
    <div class="row">
        <?php if($bien->has('images') && !empty($bien->images)): ?>
        
            <?php foreach($bien->images as $image):?>
            <div class="columns medium-4">
                <?= $this->Html->image('biens/'.$image->lien)?>
            </div>
            <?php endforeach;?>
            
            <?php if(count($bien->images) == 2 ): ?>
            <div class="columns medium-4"></div>
            <?php endif;?>
            
        <?php endif;?>
    </div>
    
    <div class="row">
        <div class="columns medium-4">
            <h5>Categorie</h5>
            <p><?= $annonce->categorie ?></p>
        </div>
        <div class="columns medium-4">
            <h5>Date de parution</h5>
            <p><?= $annonce->datedeparution->i18nFormat('dd-MM-yyyy') ?></p>
        </div>
        <div class="columns medium-4">
            <h5>Prix</h5>
            <p><?=  $this->Number->currency($annonce->prix, false, ['locale'=>'fr_FR']); ?></p>
        </div>
    </div>
    <div class="row">
        <h5>Commentaires</h5>
    </div>
    <div class="row">
        <h5>Ajouter un commentaire</h5>
    </div>
</div> 