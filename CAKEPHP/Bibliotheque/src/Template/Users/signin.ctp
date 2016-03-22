<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Inscription') ?></legend>
        <?php
            echo $this->Form->input('email');
            echo $this->Form->input('nom');
            echo $this->Form->input('prenom');
            echo $this->Form->input('adresse');
            echo $this->Form->input('codepostal');
            echo $this->Form->input('ville');
            echo $this->Form->input('password');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Créer')) ?>
    <?= $this->Form->end() ?>
</div>
