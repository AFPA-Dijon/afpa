<nav class="medium-2 columns">
    <ul class="side-nav">
        <li class="heading">NAVIGATION</li>
        <li><?= $this->Html->link('Voir matières', ['action' => 'index']) ?></li>
        <li><?= $this->Html->link('Voir étudiants', ['controller' => 'Students', 'action' => 'index']) ?></li>
    </ul>
</nav>

<div class="medium-10 columns content">
    <?php
    echo $this->Form->create($test);
    ?>
    <div class="row">
        <div class="medium-4 columns">
            
        </div>
        <div class="medium-4 columns">
            
        </div>
        <div class="medium-4 columns">
            
        </div>
    </div> 
    <div class="row">
        
    </div>
  <?php
  
    echo $this->Form->input('lieu', ['label' => 'Lieu']);
    
    echo $this->Form->input('subject_id', ['label' => 'Matière', 'options' => $matieres] );
    echo $this->Form->button('Créer');
    echo $this->Form->end();
    
    ?>
</div>