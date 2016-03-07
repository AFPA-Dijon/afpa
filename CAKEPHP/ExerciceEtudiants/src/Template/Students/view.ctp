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