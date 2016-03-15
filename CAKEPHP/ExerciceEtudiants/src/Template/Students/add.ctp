<nav class="medium-2 columns">
    <ul class="side-nav">
        <li class="heading">NAVIGATION</li>
        <li><?= $this->Html->link('Ajouter matières', ['controller' => 'Subjects', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link('Voir matières', ['controller' => 'Subjects', 'action' => 'index']) ?></li>
    </ul>
</nav>

<div class="medium-10 columns content index">
     <?= $this->Form->create($student, ['type' => 'file']) ?>
    
        <?php
            echo $this->Form->input('nom');
            echo $this->Form->input('prenom');
            echo $this->Form->input(
                'datenaiss',
                ['label' => 'Date de naissance','minYear' => 1915, 'maxYear' => date('Y')]
            );
            echo $this->Form->input('rue');
            echo $this->Form->input('cp', ['type' => 'text']);
            echo $this->Form->input('ville');
            echo $this->Form->file('image', ['accept' => 'image/gif, image/jpeg, image/png']);
        ?>
    
    <?= $this->Form->button(__('Ajouter')) ?>
    <?= $this->Form->end() ?>
</div>