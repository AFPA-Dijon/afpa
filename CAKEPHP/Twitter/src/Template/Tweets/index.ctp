<?php
$this->loadHelper('Form', [
    'templates' => 'app_form',
]);
?>
<div class="tweets index large-9 medium-8 columns content">
    <div class="row">
        <?= $this->Form->create() ?>
        <?= $this->Form->button('Poster', [ 'class' => "btn waves-effect waves-light" ]) ?>
        <?= $this->Form->end() ?>
    </div>
    <div class="row">
        <h3><?= __('Tweets') ?></h3>
        <table cellpadding="0" cellspacing="0">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tweets as $tweet): ?>
                <tr>
                    <td><?= $this->Number->format($tweet->id) ?></td>
                    <td><?= h($tweet->created) ?></td>
                    <td><?= h($tweet->modified) ?></td>
                    <td><?= $tweet->has('user') ? $this->Html->link($tweet->user->id, ['controller' => 'Users', 'action' => 'view', $tweet->user->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $tweet->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $tweet->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $tweet->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tweet->id)]) ?>
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
    
</div>
