<div class="users view large-9 medium-8 columns content">
    <h3><?= h($user->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Email') ?></th>
            <td><?= h($user->email) ?></td>
        </tr>
        <tr>
            <th><?= __('Role') ?></th>
            <td><?= h($user->role) ?></td>
        </tr>
        <tr>
            <th><?= __('Nom') ?></th>
            <td><?= h($user->nom) ?></td>
        </tr>
        <tr>
            <th><?= __('Prenom') ?></th>
            <td><?= h($user->prenom) ?></td>
        </tr>
        <tr>
            <th><?= __('Adresse') ?></th>
            <td><?= h($user->adresse) ?></td>
        </tr>
        <tr>
            <th><?= __('Ville') ?></th>
            <td><?= h($user->ville) ?></td>
        </tr>
        <tr>
            <th><?= __('Code Postal') ?></th>
            <td><?= $user->codepostal ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Emprunts') ?></h4>
        <?php if (!empty($user->emprunts)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Date d\'emprunt') ?></th>
                <th><?= __('Date de retour') ?></th>
                <th><?= __('Oeuvre') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->emprunts as $emprunts): ?>
            <tr>
                <td><?= h($emprunts->dateemprunt) ?></td>
                <td><?= h($emprunts->dateretour) ?></td>
                <td><?= h($emprunts->oeuvre->titre) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Emprunts', 'action' => 'view', $emprunts->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Emprunts', 'action' => 'edit', $emprunts->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Emprunts', 'action' => 'delete', $emprunts->id], ['confirm' => __('Are you sure you want to delete # {0}?', $emprunts->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
