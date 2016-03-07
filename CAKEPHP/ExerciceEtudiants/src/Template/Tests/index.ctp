<nav class="medium-2 columns">
    <ul class="side-nav">
        <li class="heading">NAVIGATION</li>
        <li><?= $this->Html->link('Ajouter matières', ['controller' => 'Subjects', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link('Voir matières', ['controller' => 'Subjects', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link('Voir étudiants', ['controller' => 'Students', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link('Voir étudiants', ['controller' => 'Students','action' => 'add']) ?></li>
        <li><?= $this->Html->link('Créer un test', ['action' => 'add']) ?></li>
    </ul>
</nav>

<div class="medium-10 columns content index">
    <table>
        <thead>
            <tr>
                <th>DATE</th>
                <th>LIEU</th>
                <th>MATIERE</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($tests as $test):?>
            <tr>
                <td><?= $test->datepreuve ?></td>
                <td><?= $test->lieu ?></td>
                <td><?= $test->subject->codemat ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>