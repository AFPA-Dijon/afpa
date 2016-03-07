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
                <th>ID</th>
                <th>NOM</th>
                <th>PRENOM</th>
                <th>DATE NAISSANCE</th>
                <th>RUE</th>
                <th>CP</th>
                <th>VILLE</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($students as $student):?>
            <tr>
                <td><?= $student->id ?></td>
                <td><?= $student->nom ?></td>
                <td><?= $student->prenom ?></td>
                <td><?= $student->datenaiss ?></td>
                <td><?= $student->rue ?></td>
                <td><?= $student->cp ?></td>
                <td><?= $student->ville ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>