<?php
$operateurs = [
    "plus" => "+", 
    "moins" => "-",
    "mult" => "*",
    "div" => "/",
    "mod" => "%"
];
$result = "Le résultat est : ";
$operande1 = $_POST['operande1'];
$operande2 = $_POST['operande2'];
$operateur = $_POST['operateur'];
 var_dump($_POST);

if(is_numeric($operande1) && is_numeric($operande2) && isset($operateur)){
    switch($operateur){
        case $operateurs['plus']: $result .= $operande1 + $operande2 ;break;
        case $operateurs['moins']: $result .= $operande1 - $operande2 ;break;
        case $operateurs['mult']: $result .= $operande1 * $operande2 ;break;
        case $operateurs['div']: $result .= ($operande2 == 0)? "Division par zéro impossible": $operande1 / $operande2 ;break;
        case $operateurs['mod']: $result .= $operande1 + $operande2 ;break;
        default: $result = "Operateur non-spécifié";
    }//endswitch
   
}//endif

?>

    <div class="row">
        <form class="col s12" action="index.php?page=exercice2" method="post">
            <div class="row">
                <div class="input-field col s4">
                    <input name="operande1" type="text">
                    <label for="operande1"></label>
                </div>
                <div class="input-field col s4">
                    <select name="operateur">
                      <?php foreach($operateurs as $operateur): ?>
                          <option value="<?php echo $operateur; ?>"> 
                              <?php echo $operateur; ?> 
                          </option>
                      <?php endforeach; ?>
                    </select>
                </div>
                <div class="input-field col s4">
                    <input name="operande2" type="text">
                    <label for="operande2"></label>
                </div>
            </div>
            <div class="row">
                <button class="btn waves-effect waves-light" type="submit" name="action">Calculer
                </button>
            </div>
        </form>
    </div>
    
<?php if(!empty($_POST)): ?>
    <div class="row">
        <?= $result; ?>
    </div>
<?php endif; ?>