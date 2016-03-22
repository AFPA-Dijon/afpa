<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Account Parameter'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="accountParameters index large-9 medium-8 columns content">
    <h3><?= __('Account Parameters') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('user_id') ?></th>
                <th><?= $this->Paginator->sort('locality') ?></th>
                <th><?= $this->Paginator->sort('website') ?></th>
                <th><?= $this->Paginator->sort('avatar_file_name') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($accountParameters as $accountParameter): ?>
            <tr>
                <td><?= $this->Number->format($accountParameter->id) ?></td>
                <td><?= $accountParameter->has('user') ? $this->Html->link($accountParameter->user->id, ['controller' => 'Users', 'action' => 'view', $accountParameter->user->id]) : '' ?></td>
                <td><?= h($accountParameter->locality) ?></td>
                <td><?= h($accountParameter->website) ?></td>
                <td><?= h($accountParameter->avatar_file_name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $accountParameter->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $accountParameter->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $accountParameter->id], ['confirm' => __('Are you sure you want to delete # {0}?', $accountParameter->id)]) ?>
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
