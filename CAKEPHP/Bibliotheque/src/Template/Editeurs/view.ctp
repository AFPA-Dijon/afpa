<div class="editeurs view large-9 medium-8 columns content">
    <h3><?= h($editeur->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Nom') ?></th>
            <td><?= h($editeur->nom) ?></td>
        </tr>
        <tr>
            <th><?= __('Siteweb') ?></th>
            <td><?= h($editeur->siteweb) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($editeur->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __(' Oeuvres') ?></h4>
        <?php if (!empty($editeur->oeuvres)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Titre') ?></th>
                <th><?= __('CodeISBN') ?></th>
                <th><?= __('Parution') ?></th>
                <th><?= __('Format') ?></th>
                <th><?= __('Type') ?></th>
                <th><?= __('Genre') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($editeur->oeuvres as $oeuvres): ?>
            <tr>
                <td><?= h($oeuvres->titre) ?></td>
                <td><?= h($oeuvres->codeISBN) ?></td>
                <td><?= h($oeuvres->parution) ?></td>
                <td><?= h($oeuvres->format) ?></td>
                <td><?= h($oeuvres->type) ?></td>
                <td><?= h($oeuvres->genre) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Oeuvres', 'action' => 'view', $oeuvres->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Oeuvres', 'action' => 'edit', $oeuvres->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Oeuvres', 'action' => 'delete', $oeuvres->id], ['confirm' => __('Are you sure you want to delete # {0}?', $oeuvres->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
