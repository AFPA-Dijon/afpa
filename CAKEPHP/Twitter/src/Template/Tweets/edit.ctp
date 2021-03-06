<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $tweet->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $tweet->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Tweets'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Hashtags'), ['controller' => 'Hashtags', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Hashtag'), ['controller' => 'Hashtags', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tweets form large-9 medium-8 columns content">
    <?= $this->Form->create($tweet) ?>
    <fieldset>
        <legend><?= __('Edit Tweet') ?></legend>
        <?php
            echo $this->Form->input('content');
            echo $this->Form->input('formatted_content');
            echo $this->Form->input('user_id', ['options' => $users]);
            echo $this->Form->input('hashtags._ids', ['options' => $hashtags]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
