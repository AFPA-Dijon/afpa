<div class="content">
    <table>
        <tr>
            <th>Nom</th>
            <th>Population</th>
            <th>Gouvernement</th>
        </tr>
        <?php foreach($biggestMonarchies as $monarchy):?>
        <tr>
            <td><?=$monarchy->name ?></td>
            <td><?=$monarchy->population ?></td>
            <td><?=$monarchy->government_form ?></td>
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