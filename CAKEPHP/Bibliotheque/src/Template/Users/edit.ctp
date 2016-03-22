<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Editer compte utilisateur') ?></legend>
        <?php
            echo $this->Form->input('email');
            echo $this->Form->input('nom');
            echo $this->Form->input('prenom');
            echo $this->Form->input('adresse');
            echo $this->Form->input('codepostal');
            echo $this->Form->input('ville');
            echo $this->Form->input('password');
            echo $this->Form->input('role');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Editer')) ?>
    <?= $this->Form->end() ?>
</div>
