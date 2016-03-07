<nav class="medium-2 columns">
    <ul class="side-nav">
        <li class="heading">NAVIGATION</li>
        <li><?= $this->Html->link('Ajouter matières', ['action' => 'add']) ?></li>
        <li><?= $this->Html->link('Voir étudiants', ['controller' => 'Students', 'action' => 'index']) ?></li>
    </ul>
</nav>

<div class="medium-10 columns content index">
    <table>
        <thead>
            <tr>
                <th>CODEMAT</th>
                <th>LIBELLE</th>
                <th>COEFF</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($students as $student):?>
            <tr>
                <td><?= $student->codemat ?></td>
                <td><?= $student->libelle ?></td>
                <td><?= $student->coeff ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>