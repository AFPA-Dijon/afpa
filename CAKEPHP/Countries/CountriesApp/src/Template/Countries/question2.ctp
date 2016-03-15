<div class="content">
    <table>
        <tr>
            <th>Nom</th>
            <th>Gouvernement</th>
        </tr>
        <?php foreach($republics as $republic):?>
        <tr>
            <td><?=$republic->name ?></td>
            <td><?=$republic->government_form ?></td>
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