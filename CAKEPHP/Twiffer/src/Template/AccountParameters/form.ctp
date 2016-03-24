































































<div class="accountParameters form large-9 medium-8 columns content">
    <?= $this->Form->create($accountParameter, ['type' => 'file']) ?>
    <fieldset>
        <legend><?= __('Editer paramètres du compte') ?></legend>
        <?php
            $path = !empty($accountParameter->avatar_file_name) ? $accountParameter->avatar_file_name : 'icon-male.png';
            echo $this->Html->image($path, ['class'=> 'avatar']);
            echo $this->Form->input('file', ['type' => 'file', 'label' => 'Avatar','accept' => 'image/gif, image/jpeg, image/png']);
            echo $this->Form->input('biography', ['label' => 'Biographie']);
            echo $this->Form->input('locality', ['label' => 'Ville']);
            echo $this->Form->input('website', ['label' => 'Site web']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Editer')) ?>
    <?= $this->Form->end() ?>
</div>
