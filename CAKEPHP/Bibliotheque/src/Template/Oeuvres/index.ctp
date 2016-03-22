<div class="oeuvres index large-9 medium-8 columns content">
    <h3><?= __('Oeuvres') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('titre') ?></th>
                <th><?= $this->Paginator->sort('codeISBN') ?></th>
                <th><?= $this->Paginator->sort('parution') ?></th>
                <th><?= $this->Paginator->sort('langue') ?></th>
                <th><?= $this->Paginator->sort('type') ?></th>
                <th><?= $this->Paginator->sort('genre') ?></th>
                <th><?= $this->Paginator->sort('editeur_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($oeuvres as $oeuvre): ?>
            <tr>
                <td><?= $oeuvre->id ?></td>
                <td><?= h($oeuvre->titre) ?></td>
                <td><?= $oeuvre->codeISBN ?></td>
                <td><?= h($oeuvre->parution) ?></td>
                <td><?= h($oeuvre->langue) ?></td>
                <td><?= h($oeuvre->type) ?></td>
                <td><?= h($oeuvre->genre) ?></td>
                <td><?= $oeuvre->has('editeur') ? $this->Html->link($oeuvre->editeur->nom, ['controller' => 'Editeurs', 'action' => 'view', $oeuvre->editeur->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $oeuvre->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $oeuvre->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $oeuvre->id], ['confirm' => __('Are you sure you want to delete # {0}?', $oeuvre->id)]) ?>
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
