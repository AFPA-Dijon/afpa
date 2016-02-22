<?php 
$maxTable = 10;
$maxLignes = 10;
?>
<div class="row">
    <h4>Table de multiplication à la demande</h4>
    <div class="col s6">
        <form method="post" action="index.php?page=exercice4">
          
            <div class="row">
                <div class="input-field col s12">
                    <select name="table">
                        <?php for($i = 1; $i<= ( isset($max)? $max: 10 ); $i++): ?>
                        <option value="<?=$i?>"><?=$i?></option>
                        <?php endfor; ?>
                    </select>
                    <label>Choisissez votre table</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <select name="lignes">
                        <?php for($i = 1; $i<= ( isset($max)? $max: 10 ); $i++): ?>
                        <option value="<?=$i?>"><?=$i?></option>
                        <?php endfor; ?>
                    </select>
                    <label>Choisissez le nombre de lignes</label>
                </div>
            </div>
            <div class="row">
                <button class="btn waves-effect waves-light" type="submit" name="action">Calculer
                </button>
            </div>
        </form>
    </div>
    <?php if(!empty($_POST['lignes']) && !empty($_POST['table'])): ?>
    <div class="col s6">
        <h6>Résultats</h6>
        <?php 
        for($i = 1; $i <= $_POST['lignes']; $i++){
            $resultat = $_POST['table'] * $i; 
            echo $i . " x ". $_POST['table'] . " = " .  $resultat . "<br />";
        } 
        ?>
    </div>
    <?php endif; ?>
  
    
</div>