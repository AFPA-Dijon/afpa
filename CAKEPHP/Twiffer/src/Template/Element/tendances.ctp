<h3><?= __('Tendances') ?></h3>
<?php foreach ($tendances as $hashtag): ?>
<span><?= $this->Html->link('#'.$hashtag->name, '/tweets/index/'.$hashtag->name) ?></span><br />
<?php endforeach; ?>