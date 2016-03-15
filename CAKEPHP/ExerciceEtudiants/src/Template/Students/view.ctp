<nav class="medium-2 columns">
    <ul class="side-nav">
        <li class="heading">NAVIGATION</li>
        <li><?= $this->Html->link('Ajouter matières', ['controller' => 'Subjects', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link('Voir matières', ['controller' => 'Subjects', 'action' => 'index']) ?></li>
    </ul>
</nav>

<div class="medium-10 columns content index">
    <div class="row">
        <table>
            <thead>
                <tr>
                    <th>NOM</th>
                    <th>PRENOM</th>
                    <th>PHOTO</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?= $student->nom ?></td>
                    <td><?= $student->prenom ?></td>
                    <td><?= $this->Html->image($student->image,['width'=>'128px']) ?></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="row">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('datepreuve') ?></th>
                    <th><?= $this->Paginator->sort('codemat') ?></th>
                    <th><?= $this->Paginator->sort('note') ?></th>
                </tr>
            </thead>
            
            <tbody>
                <?php foreach($participations as $participation):?>
                <tr>
                    <td><?= $participation['test']['datepreuve']->i18nFormat('dd-MM-yyyy') ?></td>
                    <td><?= $participation['test']['subject']['libelle'] ?></td>
                    <td><?= $participation['note'] ?></td>
                    
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
    <div class="row">
       <div class="panel">
          <h5>Moyenne générale: </h5>
          <p><?= $this->Number->format($moyenne, ['precision' => 2]); ?></p>
        </div> 
    </div>
    
</div>