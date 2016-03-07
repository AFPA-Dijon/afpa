<nav class="medium-2 columns">
    <ul class="side-nav">
        <li class="heading">NAVIGATION</li>
        <li><?= $this->Html->link('Voir matières', ['action' => 'index']) ?></li>
        <li><?= $this->Html->link('Voir étudiants', ['controller' => 'Students', 'action' => 'index']) ?></li>
    </ul>
</nav>

<div class="medium-10 columns content">
    <?php
    $coeffs = [1, 2, 3, 4, 5, 6, 7, 8, 9];
    $coeffs = array_combine($coeffs, $coeffs);
    echo $this->Form->create($subject);
    echo $this->Form->input('codemat', ['label' => 'Code Matière', 'class'=>'input-codemat']);
    echo $this->Form->input('libelle', ['label' => 'Libellé']);
    echo $this->Form->input('coeff', ['label' => 'Coefficient', 'options' => $coeffs] );
    echo $this->Form->button('Créer');
    echo $this->Form->end();
    
    ?>
</div>