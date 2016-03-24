<div class="large-3 medium-4 columns">
    <div class="row">
        
        <table class="vertical-table">
             <tr>
                <td>
                    <?php 
                    $path = isset($user->account_parameters) && isset($user->account_parameters[0]->avatar_file_name) ? $user->account_parameters[0]->avatar_file_name : 'icon-male.png';
                    echo $this->Html->image($path, ['class'=> 'avatar']);
                    ?>
                </td> 
            </tr>
            <tr>
                <td><h3><?= h($user->first_name). ' ' . h($user->last_name) ?></h3></td>
            </tr>
            <tr>
                <th><?= __('Prenom') ?></th>
                <td><?= h($user->first_name) ?></td>
            </tr>
            <tr>
                <th><?= __('Nom') ?></th>
                <td><?= h($user->last_name) ?></td>
            </tr>
            <tr>
                <th><?= __('Email') ?></th>
                <td><?= h($user->email) ?></td>
            </tr>
            <?php if (!empty($user->account_parameters)): ?>
            <tr>
                <th><?= __('Biographie') ?></th>
                <td><?= h($user->account_parameters[0]->biography) ?></td>
            </tr>
            <tr>
                <th><?= __('Ville') ?></th>
                <td><?= h($user->account_parameters[0]->locality) ?></td>
            </tr>
            <tr>
                <th><?= __('Site web') ?></th>
                <td><?= h($user->account_parameters[0]->website) ?></td>
            </tr>
            <? endif;?>
        </table>
    </div>
   
</div>
<div class="users view large-9 medium-8 columns content">
    
    
    <div class="related">
        <h4><?= __('Profil de '. $user->username) ?></h4>
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
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
