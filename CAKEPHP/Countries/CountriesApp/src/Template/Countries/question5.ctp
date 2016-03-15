<div class="content">
    <table>
        <tr>
            <th>Nom</th>
            <th>Langue officielle</th>
        </tr>
        <?php foreach($countries as $country):?>
        <tr>
            <td><?=$country->name ?></td>
            <td><?=$country->_matchingData['Languages']->language ?></td>
        </tr>
        <?php endforeach;?>
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