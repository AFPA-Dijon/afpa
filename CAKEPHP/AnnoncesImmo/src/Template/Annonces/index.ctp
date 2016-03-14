<div class="content">
    <?= $this->Form->create() ?>
    <legend>Filtres</legend>
    <div class="row">
        <table class="vertical-table">
            <tr>
                <th>Catégorie</th>
                <td><?= $this->Form->input('categorie', ['label' => '', 'options' => $categories, 'empty' => 'Toutes']) ?></td>
                <td></td>
            </tr>
            <tr>
                <th>Date de parution</th>
                <td><?= $this->Form->input('datedeparution', ['label' => '', 'options' => ['-1 weeks' => '1 weeks', '-2 weeks' => '2 weeks', '-3 weeks' => '3 weeks',
                                                              '-1 months' => '1 months', '-2 months' => '2 months', '-2 months' => '2 months', '-4 weeks' => '4 months', '-6 months' => '6 months',
                                                              '-1 years' => '1 years'],
                                                                'empty' => 'Toutes les dates' ]
                                                                ) ?>
            <tr>
                <th>Type</th>
                <td><?=$this->Form->input('type_id', ['label' => '', 'options' => $types, 'empty' => 'Toutes'])  ?></td>
            </tr>
            <tr>
                <th>Nombre de pièces</th>
                <td><?= $this->Form->input('nombredepieces', ['label' => '','type' => 'numeric']) ?></td>
            </tr>
            <tr>
                <th>Prix min.</th>
                <td><?= $this->Form->input('prixmin', ['type' => 'numeric', 'label' => '']) ?></td>
            </tr>
            <tr>
                <th>Prix max.</th>
                <td><?= $this->Form->input('prixmax', ['type' => 'numeric', 'label' => '']) ?></td>
            </tr>
            <tr>
                <th>Ville</th>
                <td><?=$this->Form->input('ville', ['label' => '', 'options' => $villes, 'empty' => 'Toutes'])  ?></td>
            </tr>
        </table>
    </div>
    <div class="row">
        <?= $this->Form->button('Appliquer filtres') ?>
    </div>
    <?= $this->Form->end() ?>
    <div class="row">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>BIEN</th>
                    <th>CAT</th>
                    <th>DATE</th>
                    <th>PRIX</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($annonces as $annonce):?>
                <tr>
                    <td><?= $annonce->id ?></td>
                    <td><?= $this->Html->link('Bien', ['controller' => 'Biens', 'action' => 'view', $annonce->bien_id]) ?></td>
                    <td><?= $annonce->categorie ?></td>
                    <td><?= $annonce->datedeparution->i18nFormat('dd-MM-yyyy') ?></td>
                    <td><?= $annonce->prix ?></td>
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
 
</div>