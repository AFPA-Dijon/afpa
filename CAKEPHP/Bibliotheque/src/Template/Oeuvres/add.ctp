<div class="oeuvres form large-9 medium-8 columns content">
    <?= $this->Form->create($oeuvre) ?>
    <fieldset>
        <legend><?= __('Ajouter Oeuvre') ?></legend>
        <?php
            echo $this->Form->input('titre');
            echo $this->Form->input('codeISBN');
            echo $this->Form->input('parution');
            echo $this->Form->input('format');
            echo $this->Form->input('description');
            echo $this->Form->input('langue');
            echo $this->Form->input('type');
            echo $this->Form->input('genre');
            echo $this->Form->input('front', ['type' => 'file']);
            echo $this->Form->input('back', ['type' => 'file']);
            echo $this->Form->input('editeur_id', ['options' => $editeurs]);
            echo $this->Form->input('auteurs._ids', ['options' => $auteurs]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
