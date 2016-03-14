<div class="content">
<?= $this->Form->create($bien, ['type' => 'file'])?>
<?= $this->Form->input('adresse')?>
<?= $this->Form->input('ville')?>
<?= $this->Form->input('description')?>
<?= $this->Form->input('type_id', ['options' => $types])?>
<?= $this->Form->input('nombredepieces')?>

<?= $this->Form->file('image[]', ['accept' => 'image/gif, image/jpeg, image/png, image/jpg'])?>
<?= $this->Form->file('image[]', ['accept' => 'image/gif, image/jpeg, image/png, image/jpg'])?>
<?= $this->Form->file('image[]', ['accept' => 'image/gif, image/jpeg, image/png, image/jpg'])?>

<?= $this->Form->button('Créer')?>
<?= $this->Form->end()?>
</div>