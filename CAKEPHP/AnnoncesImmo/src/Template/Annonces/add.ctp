<div class="content">
<?= $this->Form->create($annonce)?>
<?= $this->Form->input('prix')?>
<?= $this->Form->input('categorie', ['options' => $categories])?>
<?= $this->Form->input('bien_id', ['options' => $biens])?>
<?= $this->Form->button('Publier')?>
<?= $this->Form->end()?>
</div>

  