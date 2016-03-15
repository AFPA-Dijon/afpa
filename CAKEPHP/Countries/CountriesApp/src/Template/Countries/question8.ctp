<div class="content">
    <div class="row">
        <?= $this->Form->create()?>
        <?= $this->Form->input('language', ['label' => 'Sélectionner une langue officielle', 'options' => $officialLanguages])?>
        <?= $this->Form->input('percentage', ['type' => 'numeric', 'label' => 'Sélectionner un pourcentage'])?>
        <?= $this->Form->button('Filtrer')?>
        <?= $this->Form->end()?>
    </div>
    <?php if(isset($countries)):?>
    <div class="row">
        <table>
            <tr>
                <th>Nom</th>
                <th>Pourcentage</th>
            </tr>
            <?php foreach($countries as $country):?>
            <tr>
                <td><?=$country->name ?></td>
                <td><?=$country->_matchingData['Languages']->percentage ?></td>
            </tr>
            <?php endforeach;?>
        </table>
        
    </div>
    <?php endif;?>

</div>