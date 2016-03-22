<div class="editeurs index large-9 medium-8 columns content">
    <h3><?= __('Editeurs') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('nom') ?></th>
                <th><?= $this->Paginator->sort('siteweb') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($editeurs as $editeur): ?>
            <tr>
                <td><?= h($editeur->nom) ?></td>
                <td><?= h($editeur->siteweb) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $editeur->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $editeur->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $editeur->id], ['confirm' => __('Are you sure you want to delete # {0}?', $editeur->id)]) ?>
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
