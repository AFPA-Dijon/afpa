<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Hashtag'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Tweets'), ['controller' => 'Tweets', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Tweet'), ['controller' => 'Tweets', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="hashtags index large-9 medium-8 columns content">
    <h3><?= __('Hashtags') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('counter') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($hashtags as $hashtag): ?>
            <tr>
                <td><?= $this->Number->format($hashtag->id) ?></td>
                <td><?= h($hashtag->name) ?></td>
                <td><?= $this->Number->format($hashtag->counter) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $hashtag->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $hashtag->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $hashtag->id], ['confirm' => __('Are you sure you want to delete # {0}?', $hashtag->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
