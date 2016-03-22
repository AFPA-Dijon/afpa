<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Hashtag'), ['action' => 'edit', $hashtag->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Hashtag'), ['action' => 'delete', $hashtag->id], ['confirm' => __('Are you sure you want to delete # {0}?', $hashtag->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Hashtags'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Hashtag'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tweets'), ['controller' => 'Tweets', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tweet'), ['controller' => 'Tweets', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="hashtags view large-9 medium-8 columns content">
    <h3><?= h($hashtag->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($hashtag->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($hashtag->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Counter') ?></th>
            <td><?= $this->Number->format($hashtag->counter) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Tweets') ?></h4>
        <?php if (!empty($hashtag->tweets)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Content') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th><?= __('Formatted Content') ?></th>
                <th><?= __('User Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($hashtag->tweets as $tweets): ?>
            <tr>
                <td><?= h($tweets->id) ?></td>
                <td><?= h($tweets->content) ?></td>
                <td><?= h($tweets->created) ?></td>
                <td><?= h($tweets->modified) ?></td>
                <td><?= h($tweets->formatted_content) ?></td>
                <td><?= h($tweets->user_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Tweets', 'action' => 'view', $tweets->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Tweets', 'action' => 'edit', $tweets->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Tweets', 'action' => 'delete', $tweets->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tweets->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
