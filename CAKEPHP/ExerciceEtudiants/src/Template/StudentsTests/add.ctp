<nav class="medium-2 columns">
    <ul class="side-nav">
        <li class="heading">NAVIGATION</li>
        <li><?= $this->Html->link('Ajouter matières', ['controller' => 'Subjects', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link('Voir matières', ['controller' => 'Subjects', 'action' => 'index']) ?></li>
    </ul>
</nav>

<div class="medium-10 columns content">
     <?php
    echo $this->Form->create($studentTest) ;
    echo $this->Form->input('student_id', ['label' => 'Etudiant', 'options' => $students] );
    echo $this->Form->input('test_id', ['label' => 'Examen', 'options' => $tests] );
    echo $this->Form->input('note', ['label' => 'Note (/20)']);
    echo $this->Form->button('Ajouter');
    echo $this->Form->end();
    ?>
</div>