<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Tweet'), ['action' => 'edit', $tweet->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Tweet'), ['action' => 'delete', $tweet->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tweet->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Tweets'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tweet'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Hashtags'), ['controller' => 'Hashtags', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Hashtag'), ['controller' => 'Hashtags', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="tweets view large-9 medium-8 columns content">
    <h3><?= h($tweet->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $tweet->has('user') ? $this->Html->link($tweet->user->id, ['controller' => 'Users', 'action' => 'view', $tweet->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($tweet->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($tweet->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($tweet->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Content') ?></h4>
        <?= $this->Text->autoParagraph(h($tweet->content)); ?>
    </div>
    <div class="row">
        <h4><?= __('Formatted Content') ?></h4>
        <?= $this->Text->autoParagraph(h($tweet->formatted_content)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Hashtags') ?></h4>
        <?php if (!empty($tweet->hashtags)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Counter') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($tweet->hashtags as $hashtags): ?>
            <tr>
                <td><?= h($hashtags->id) ?></td>
                <td><?= h($hashtags->name) ?></td>
                <td><?= h($hashtags->counter) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Hashtags', 'action' => 'view', $hashtags->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Hashtags', 'action' => 'edit', $hashtags->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Hashtags', 'action' => 'delete', $hashtags->id], ['confirm' => __('Are you sure you want to delete # {0}?', $hashtags->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
