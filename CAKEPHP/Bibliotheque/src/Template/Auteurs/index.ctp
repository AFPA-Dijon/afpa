<div class="auteurs index large-9 medium-8 columns content">
    <h3><?= __('Auteurs') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('nom') ?></th>
                <th><?= $this->Paginator->sort('prenom') ?></th>
                <th><?= $this->Paginator->sort('nationalite') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($auteurs as $auteur): ?>
            <tr>
                <td><?= $this->Number->format($auteur->id) ?></td>
                <td><?= h($auteur->nom) ?></td>
                <td><?= h($auteur->prenom) ?></td>
                <td><?= h($auteur->nationalite) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $auteur->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $auteur->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $auteur->id], ['confirm' => __('Are you sure you want to delete # {0}?', $auteur->id)]) ?>
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
