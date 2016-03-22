<div class="auteurs view large-9 medium-8 columns content">
    <h3><?= h($auteur->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Nom') ?></th>
            <td><?= h($auteur->nom) ?></td>
        </tr>
        <tr>
            <th><?= __('Prenom') ?></th>
            <td><?= h($auteur->prenom) ?></td>
        </tr>
        <tr>
            <th><?= __('Pseudo') ?></th>
            <td><?= h($auteur->pseudo) ?></td>
        </tr>
        <tr>
            <th><?= __('Nationalite') ?></th>
            <td><?= h($auteur->nationalite) ?></td>
        </tr>
        <tr>
            <th><?= __('Biographie') ?></th>
            <td><?= h($auteur->biographie) ?></td>
        </tr>
        <tr>
            <th><?= __('Photo') ?></th>
            <td><?= h($auteur->photo) ?></td>
        </tr>
        <tr>
            <th><?= __('Naissance') ?></th>
            <td><?= h($auteur->naissance) ?></td>
        </tr>
        <tr>
            <th><?= __('Deces') ?></th>
            <td><?= h($auteur->deces) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Oeuvres') ?></h4>
        <?php if (!empty($auteur->oeuvres)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Titre') ?></th>
                <th><?= __('Parution') ?></th>
                <th><?= __('Langue') ?></th>
                <th><?= __('Type') ?></th>
                <th><?= __('Genre') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($auteur->oeuvres as $oeuvres): ?>
            <tr>
                <td><?= h($oeuvres->titre) ?></td>
                <td><?= h($oeuvres->parution) ?></td>
                <td><?= h($oeuvres->langue) ?></td>
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
