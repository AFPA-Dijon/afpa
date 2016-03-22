<div class="oeuvres view large-9 medium-8 columns content">
    <h3><?= h($oeuvre->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Titre') ?></th>
            <td><?= h($oeuvre->titre) ?></td>
        </tr>
        <tr>
            <th><?= __('Format') ?></th>
            <td><?= h($oeuvre->format) ?></td>
        </tr>
        <tr>
            <th><?= __('Description') ?></th>
            <td><?= h($oeuvre->description) ?></td>
        </tr>
        <tr>
            <th><?= __('Langue') ?></th>
            <td><?= h($oeuvre->langue) ?></td>
        </tr>
        <tr>
            <th><?= __('Type') ?></th>
            <td><?= h($oeuvre->type) ?></td>
        </tr>
        <tr>
            <th><?= __('Genre') ?></th>
            <td><?= h($oeuvre->genre) ?></td>
        </tr>
        <tr>
            <th><?= __('Front') ?></th>
            <td><?= h($oeuvre->front) ?></td>
        </tr>
        <tr>
            <th><?= __('Back') ?></th>
            <td><?= h($oeuvre->back) ?></td>
        </tr>
        <tr>
            <th><?= __('Editeur') ?></th>
            <td><?= $oeuvre->has('editeur') ? $this->Html->link($oeuvre->editeur->id, ['controller' => 'Editeurs', 'action' => 'view', $oeuvre->editeur->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($oeuvre->id) ?></td>
        </tr>
        <tr>
            <th><?= __('CodeISBN') ?></th>
            <td><?= $this->Number->format($oeuvre->codeISBN) ?></td>
        </tr>
        <tr>
            <th><?= __('Parution') ?></th>
            <td><?= h($oeuvre->parution) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Auteurs') ?></h4>
        <?php if (!empty($oeuvre->auteurs)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Nom') ?></th>
                <th><?= __('Prenom') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($oeuvre->auteurs as $auteurs): ?>
            <tr>
                <td><?= h($auteurs->nom) ?></td>
                <td><?= h($auteurs->prenom) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Auteurs', 'action' => 'view', $auteurs->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Auteurs', 'action' => 'edit', $auteurs->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Auteurs', 'action' => 'delete', $auteurs->id], ['confirm' => __('Are you sure you want to delete # {0}?', $auteurs->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
