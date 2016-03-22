<div class="emprunts form large-9 medium-8 columns content">
    <?= $this->Form->create($emprunt) ?>
    <fieldset>
        <legend><?= __('Ajout Emprunt') ?></legend>
        <?php
            echo $this->Form->input('dateemprunt');
            echo $this->Form->input('dateretour');
            echo $this->Form->input('oeuvre_id', ['options' => $oeuvres]);
            echo $this->Form->input('user_id', ['options' => $users]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Créer')) ?>
    <?= $this->Form->end() ?>
</div>
