<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Emprunt'), ['action' => 'edit', $emprunt->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Emprunt'), ['action' => 'delete', $emprunt->id], ['confirm' => __('Are you sure you want to delete # {0}?', $emprunt->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Emprunts'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Emprunt'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Oeuvres'), ['controller' => 'Oeuvres', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Oeuvre'), ['controller' => 'Oeuvres', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="emprunts view large-9 medium-8 columns content">
    <h3><?= h($emprunt->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Oeuvre') ?></th>
            <td><?= $emprunt->has('oeuvre') ? $this->Html->link($emprunt->oeuvre->id, ['controller' => 'Oeuvres', 'action' => 'view', $emprunt->oeuvre->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $emprunt->has('user') ? $this->Html->link($emprunt->user->id, ['controller' => 'Users', 'action' => 'view', $emprunt->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($emprunt->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Dateemprunt') ?></th>
            <td><?= h($emprunt->dateemprunt) ?></td>
        </tr>
        <tr>
            <th><?= __('Dateretour') ?></th>
            <td><?= h($emprunt->dateretour) ?></td>
        </tr>
    </table>
</div>
