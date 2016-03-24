<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('S\'inscrire') ?></legend>
        <?php
            echo $this->Form->input('username', ['label' => 'Nom d\'utilisateur']);
            echo $this->Form->input('password', ['label' => 'Mot de passe']);
            echo $this->Form->input('first_name', ['label' => 'Prenom']);
            echo $this->Form->input('last_name', ['label' => 'Nom']);
            echo $this->Form->input('email', ['label' => 'Email', 'type' => 'email']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Inscription')) ?>
    <?= $this->Form->end() ?>
</div>
