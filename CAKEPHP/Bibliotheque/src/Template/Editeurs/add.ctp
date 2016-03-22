<div class="editeurs form large-9 medium-8 columns content">
    <?= $this->Form->create($editeur) ?>
    <fieldset>
        <legend><?= __('Ajouter éditeur') ?></legend>
        <?php
            echo $this->Form->input('nom');
            echo $this->Form->input('siteweb');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Créer')) ?>
    <?= $this->Form->end() ?>
</div>
