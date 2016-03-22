<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Account Parameters'), ['controller' => 'AccountParameters', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Account Parameter'), ['controller' => 'AccountParameters', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tweets'), ['controller' => 'Tweets', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tweet'), ['controller' => 'Tweets', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="users view large-9 medium-8 columns content">
    <h3><?= h($user->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Username') ?></th>
            <td><?= h($user->username) ?></td>
        </tr>
        <tr>
            <th><?= __('Password') ?></th>
            <td><?= h($user->password) ?></td>
        </tr>
        <tr>
            <th><?= __('First Name') ?></th>
            <td><?= h($user->first_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Last Name') ?></th>
            <td><?= h($user->last_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Email') ?></th>
            <td><?= h($user->email) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($user->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($user->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Account Parameters') ?></h4>
        <?php if (!empty($user->account_parameters)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Biography') ?></th>
                <th><?= __('Locality') ?></th>
                <th><?= __('Website') ?></th>
                <th><?= __('Avatar File Name') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->account_parameters as $accountParameters): ?>
            <tr>
                <td><?= h($accountParameters->id) ?></td>
                <td><?= h($accountParameters->user_id) ?></td>
                <td><?= h($accountParameters->biography) ?></td>
                <td><?= h($accountParameters->locality) ?></td>
                <td><?= h($accountParameters->website) ?></td>
                <td><?= h($accountParameters->avatar_file_name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'AccountParameters', 'action' => 'view', $accountParameters->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'AccountParameters', 'action' => 'edit', $accountParameters->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'AccountParameters', 'action' => 'delete', $accountParameters->id], ['confirm' => __('Are you sure you want to delete # {0}?', $accountParameters->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Tweets') ?></h4>
        <?php if (!empty($user->tweets)): ?>
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
            <?php foreach ($user->tweets as $tweets): ?>
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
