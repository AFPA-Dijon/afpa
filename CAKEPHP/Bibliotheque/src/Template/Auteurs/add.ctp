<div class="auteurs form large-9 medium-8 columns content">
    <?= $this->Form->create($auteur) ?>
    <fieldset>
        <legend><?= __('Nouvelle Auteur') ?></legend>
        <?php
            echo $this->Form->input('nom');
            echo $this->Form->input('prenom');
            echo $this->Form->input('pseudo');
            echo $this->Form->input('naissance');
            echo $this->Form->input('deces');
            echo $this->Form->input('nationalite');
            echo $this->Form->input('biographie');
            echo $this->Form->input('photo');
            echo $this->Form->input('oeuvres._ids', ['options' => $oeuvres]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Ajouter')) ?>
    <?= $this->Form->end() ?>
</div>
