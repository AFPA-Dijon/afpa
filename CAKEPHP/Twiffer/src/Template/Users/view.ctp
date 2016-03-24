<div class="large-3 medium-4 columns">
    <div class="row">
        
        <table class="vertical-table">
             <tr>
                <td>
                    <?php 
                    $path = !empty($user->account_parameters) && !empty($user->account_parameters[0]->avatar_file_name) ? $user->account_parameters[0]->avatar_file_name : 'icon-male.png';
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
            <?php endif; ?>
        </table>
    </div>
    <div class="row">
        <?= $this->element('tendances') ?>
    </div>
   
</div>
<div class="users view large-9 medium-8 columns content">
    
    
    <h3><?= __('Tweets') ?></h3>
    <?php foreach($user->tweets as $tweet):?>
    <div class="row tweet">
        <div class="large-2 medium-2 columns ">
            <?php
            $avatar = !empty($user->account_parameters) && !empty($user->account_parameters[0]->avatar_file_name)? $user->account_parameters[0]->avatar_file_name : 'icon-male.png';
            echo $this->Html->image($avatar);
            ?>
        </div>
        <div class="large-10 medium-10 columns">
            <strong><?=  $this->Html->link($user->username, ['controller' => 'users', 'action' => 'view', $tweet->user_id]) ?></strong>
            <span class="created"><?= $tweet->created->i18nFormat('dd-MM-yyyy HH:mm:ss', 'Europe/Paris', '24h') ?></span>
            <br />
            <?= $tweet->formatted_content ?>
        </div>
    </div>
    <?php endforeach;?>
    
</div>