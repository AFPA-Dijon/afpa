<?php  
$lettres = ['A','B','C','D','E','F','G','H','I','J'];
$chiffres = [1,2,3,4,5,6,7,8,9,10];

$grille = [
    1 => [1, 0, 0, 1, 0, 0, 0, 0, 0, 0],
    2 => [1, 0, 0, 1, 0, 1, 1, 1, 1, 0],
    3 => [1, 0, 0, 1, 0, 0, 0, 0, 0, 0],
    4 => [0, 0, 0, 1, 0, 0, 0, 0, 0, 0],
    5 => [0, 0, 0, 1, 0, 0, 0, 0, 0, 0],
    6 => [0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
    7 => [0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
    8 => [0, 0, 0, 1, 1, 1, 0, 0, 0, 0],
    9 => [1, 0, 0, 0, 0, 0, 0, 0, 0, 0],
    10 => [1, 0, 0, 0, 0, 0, 0, 0, 0, 0]
];

function touche($string, $int, $grille){
    $string = ord($string) - 65;
    return ($grille[$int][$string] == 1);
}
?>



<div class="row">
    <table class="grille-bataillenavale">
        <tr>
            <?php foreach($lettres as $lettre): ?>
            <th style=" text-align: center;">
                <?=$lettre?>
            </th>
            <?php endforeach; ?>
        </tr>
        <?php foreach($grille as $ligne): ?>
        <tr>
            <?php foreach($ligne as $case): ?>
            <td class="cell-bataillenavale" style="background-color: <?php echo ($case == 1)? '#777': '#FFF'; ?> ;"></td>
            <?php endforeach; ?>
        </tr>
        <?php endforeach; ?>
    </table>
</div>

<div class="row">
    <form method="post" action="index.php?page=bataillenavale">
        <div class="input-field col s4">
            <select name="x">
                <?php foreach($lettres as $lettre): ?>
                <option value="<?=$lettre?>">
                    <?=$lettre?>
                </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="input-field col s4">
            <select name="y">
                <?php foreach($chiffres as $chiffre): ?>
                <option value="<?=$chiffre?>">
                    <?=$chiffre?>
                </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="input-field col s4">
            <button class="btn waves-effect waves-light blue-grey darken-2" type="submit" name="action">Essai
            </button>
        </div>
    </form>
</div>

<?php if(!empty($_POST['x']) && !empty($_POST['y'])):?>
<div class="row">
    <div class="card-panel teal lighten-2">
       <?php echo touche($_POST['x'], $_POST['y'], $grille)? "Touché!": "Dans l'eau!"; ?>
    </div>
</div>
<?php endif;?>
