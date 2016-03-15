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
                <td><?= $this->Form->input('datedeparution', ['label' => '', 'options' => [
                                                              '-1 days' => 'Il y a un jour','-2 days' => 'Il y a deux jours','-3 days' => 'Il y a trois jour','-4 days' => 'Il y a quatres jours',
                                                              '-1 weeks' => 'Il y a une semaine ', '-2 weeks' => 'Il y a deux semaines ', '-3 weeks' => 'Il y a trois semaines ',
                                                              '-1 months' => 'Il y a un mois', '-2 months' => 'Il y a deux mois', '-3 months' => 'Il y a trois mois', '-4 weeks' => 'Il y a quatre mois', '-6 months' => 'Il y a six mois',
                                                              '-1 years' => 'Il y a un an'],
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