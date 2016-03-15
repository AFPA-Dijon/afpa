 <nav class="medium-2 columns">
    <ul class="side-nav">
        <li class="heading">NAVIGATION</li>
        <li><?= $this->Html->link('Ajouter matières', ['controller' => 'Subjects', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link('Voir matières', ['controller' => 'Subjects', 'action' => 'index']) ?></li>
    </ul>
</nav>

<div class="medium-10 columns content">
     <table>
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('datepreuve') ?></th>
                <th><?= $this->Paginator->sort('codemat') ?></th>
                <th><?= $this->Paginator->sort('lieu') ?></th>
                <th><?= $this->Paginator->sort('nom') ?></th>
                <th><?= $this->Paginator->sort('prenom') ?></th>
                <th><?= $this->Paginator->sort('note') ?></th>
            </tr>
        </thead>
        
        <tbody>
            <?php  foreach($studentsTests as $studentTest): ?>
            <tr>
                <td><?= $studentTest['test']['datepreuve']->i18nFormat('dd-MM-yyyy') ?></td>
                <td><?= $studentTest['test']['subject']['codemat'] ?></td>
                <td><?= $studentTest['test']['lieu'] ?></td>
                <td><?= $studentTest['student']['nom'] ?></td>
                <td><?= $studentTest['student']['prenom'] ?></td>
                <td><?= $studentTest['note'] ?></td>
                
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