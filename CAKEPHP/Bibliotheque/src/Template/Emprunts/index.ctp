<div class="emprunts index large-9 medium-8 columns content">
    <h3><?= __('Emprunts') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('dateemprunt') ?></th>
                <th><?= $this->Paginator->sort('dateretour') ?></th>
                <th><?= $this->Paginator->sort('oeuvre_id') ?></th>
                <th><?= $this->Paginator->sort('user_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($emprunts as $emprunt): ?>
            <tr>
                <td><?= h($emprunt->dateemprunt) ?></td>
                
                <td class="<?= (isset($emprunt->retard) && $emprunt->retard) ? "retard": "" ?>"><?= h($emprunt->dateretour) ?></td>
                <td><?= $emprunt->has('oeuvre') ? $this->Html->link($emprunt->oeuvre->titre, ['controller' => 'Oeuvres', 'action' => 'view', $emprunt->oeuvre->id]) : '' ?></td>
                <td><?= $emprunt->has('user') ? $this->Html->link($emprunt->user->full_name, ['controller' => 'Users', 'action' => 'view', $emprunt->user->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $emprunt->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $emprunt->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $emprunt->id], ['confirm' => __('Are you sure you want to delete # {0}?', $emprunt->id)]) ?>
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
