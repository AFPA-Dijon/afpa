<nav class="medium-2 columns">
    <ul class="side-nav">
        <li class="heading">NAVIGATION</li>
        <li><?= $this->Html->link('Ajouter matières', ['controller' => 'Subjects', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link('Voir matières', ['controller' => 'Subjects', 'action' => 'index']) ?></li>
    </ul>
</nav>

<div class="medium-10 columns content index">
    <table>
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('nom') ?></th>
                <th><?= $this->Paginator->sort('prenom') ?></th>
                <th><?= $this->Paginator->sort('datenaiss') ?></th>
                <th><?= $this->Paginator->sort('rue') ?></th>
                <th><?= $this->Paginator->sort('cp') ?></th>
                <th><?= $this->Paginator->sort('ville') ?></th>
                
                <th><?= 'ACTIONS' ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($students as $student):?>
            <tr>
                <td><?= $student->id ?></td>
                <td><?= $student->nom ?></td>
                <td><?= $student->prenom ?></td>
                <td><?= $student->datenaiss->i18nFormat('dd-MM-yyyy') ?></td>
                <td><?= $student->rue ?></td>
                <td><?= $student->cp ?></td>
                <td><?= $student->ville ?></td>
                <?php /*<td>
                    <?= $this->Html->link('Voir profil', '/students/view/'. $student->id ) ?>
                    </td> */ 
                ?>
                <td><?= $this->Html->link('Voir profil', ['action'=> 'view', $student->id] ) ?></td>
               
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< Previous') ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next('Next >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>