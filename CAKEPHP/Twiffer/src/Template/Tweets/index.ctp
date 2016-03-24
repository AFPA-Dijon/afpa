<div class="large-3 medium-4 columns" >
    <h3><?= __('Tendances') ?></h3>
</div>
<div class="tweets index large-9 medium-8 columns content">
    <div class="row">
        <?= $this->Form->create($newTweet) ?>
        <?= $this->Form->input('content', ['label' => '']) ?>
        <?= $this->Form->button('Tweeter', ['id' => 'button-tweet']) ?>
        <?= $this->Form->end()?>
    </div>
    
    <h3><?= __('Tweets') ?></h3>
    
</div>
