<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Account Parameter'), ['action' => 'edit', $accountParameter->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Account Parameter'), ['action' => 'delete', $accountParameter->id], ['confirm' => __('Are you sure you want to delete # {0}?', $accountParameter->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Account Parameters'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Account Parameter'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="accountParameters view large-9 medium-8 columns content">
    <h3><?= h($accountParameter->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $accountParameter->has('user') ? $this->Html->link($accountParameter->user->id, ['controller' => 'Users', 'action' => 'view', $accountParameter->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Locality') ?></th>
            <td><?= h($accountParameter->locality) ?></td>
        </tr>
        <tr>
            <th><?= __('Website') ?></th>
            <td><?= h($accountParameter->website) ?></td>
        </tr>
        <tr>
            <th><?= __('Avatar File Name') ?></th>
            <td><?= h($accountParameter->avatar_file_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($accountParameter->id) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Biography') ?></h4>
        <?= $this->Text->autoParagraph(h($accountParameter->biography)); ?>
    </div>
</div>
