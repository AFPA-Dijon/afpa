<div class="users form">
<?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Inscription') ?></legend>
        <?= $this->Form->input('username') ?>
        <?= $this->Form->input('password') ?>
        <?= $this->Form->input('role', [
            'options' => ['admin' => 'Admin', 'author' => 'Author']
        ]) ?>
    </fieldset>
<?= $this->Form->button(__('Ajouter')); ?>
<?= $this->Form->end() ?>
</div>