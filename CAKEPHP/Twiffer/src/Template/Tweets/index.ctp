<div class="large-3 medium-4 columns" >
    <?= $this->element('tendances') ?>
</div>
<div class="tweets index large-9 medium-8 columns content">
    <?php if(!empty($this->request->pass[0])): ?>
    <h2><?= __('Tweets à propos de #'. $this->request->pass[0]) ?></h2>
    <?php endif; ?>
    
    <?php if($currentUser): ?>
    <div class="row">
        <?= $this->Form->create($newTweet) ?>
        <?= $this->Form->input('content', ['label' => '']) ?>
        <?= $this->Form->button('Tweeter', ['id' => 'button-tweet']) ?>
        <?= $this->Form->end()?>
    </div>
    <?php endif; ?>
    <?php foreach($tweets as $tweet):?>
    <div class="row tweet">
        <div class="large-2 medium-2 columns ">
            <?php
            $avatar = !empty($tweet->user->account_parameters) && !empty($tweet->user->account_parameters[0]) && !empty($tweet->user->account_parameters[0]->avatar_file_name) ? $tweet->user->account_parameters[0]->avatar_file_name : 'icon-male.png';
            echo $this->Html->image($avatar);
            ?>
        </div>
        <div class="large-10 medium-10 columns">
            <strong><?=  $this->Html->link($tweet->user->username, ['controller' => 'users', 'action' => 'view', $tweet->user_id]) ?></strong>
            <span class="created"><?= $tweet->created->i18nFormat('dd-MM-yyyy HH:mm:ss', 'Europe/Paris', '24h') ?></span>
            <br />
            <?= $tweet->formatted_content ?>
        </div>
    </div>
    <?php endforeach;?>
</div>
