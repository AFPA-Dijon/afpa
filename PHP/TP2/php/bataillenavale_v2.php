<?php
$grille = [
    1 => [ 'A' => 1, 'B' => 0, 'C' => 1, 'D' => 1, 'E' => 0, 'F' => 0, 'G' => 1, 'H' => 0, 'I' => 0, 'J' => 0],
    2 => [ 'A' => 1, 'B' => 0, 'C' => 0, 'D' => 0, 'E' => 0, 'F' => 0, 'G' => 1, 'H' => 0, 'I' => 0, 'J' => 0],
    3 => [ 'A' => 1, 'B' => 0, 'C' => 0, 'D' => 0, 'E' => 0, 'F' => 0, 'G' => 1, 'H' => 0, 'I' => 0, 'J' => 0],
    4 => [ 'A' => 0, 'B' => 0, 'C' => 0, 'D' => 0, 'E' => 0, 'F' => 0, 'G' => 1, 'H' => 0, 'I' => 0, 'J' => 0],
    5 => [ 'A' => 0, 'B' => 0, 'C' => 0, 'D' => 0, 'E' => 0, 'F' => 0, 'G' => 1, 'H' => 0, 'I' => 0, 'J' => 0],
    6 => [ 'A' => 0, 'B' => 0, 'C' => 0, 'D' => 0, 'E' => 0, 'F' => 0, 'G' => 0, 'H' => 0, 'I' => 0, 'J' => 0],
    7 => [ 'A' => 0, 'B' => 0, 'C' => 0, 'D' => 0, 'E' => 0, 'F' => 0, 'G' => 0, 'H' => 0, 'I' => 0, 'J' => 0],
    8 => [ 'A' => 1, 'B' => 0, 'C' => 0, 'D' => 0, 'E' => 0, 'F' => 0, 'G' => 0, 'H' => 0, 'I' => 0, 'J' => 0],
    9 => [ 'A' => 1, 'B' => 0, 'C' => 0, 'D' => 0, 'E' => 0, 'F' => 0, 'G' => 0, 'H' => 0, 'I' => 0, 'J' => 0],
    10 => [ 'A' => 1, 'B' => 0, 'C' => 1, 'D' => 1, 'E' => 1, 'F' => 0, 'G' => 0, 'H' => 0, 'I' => 0, 'J' => 0],
];

function touche($string, $int, $grille){
    return $grille[$int][$string] == 1;
}


?>
<div class="row content-title">
    <h4 class="center blue-grey-text text-darken-1">Bataille navale v2</h4>
</div>
<div class="row">
    <table>
        <tr>
            <th></th>
            <?php foreach($grille[1] as $key => $value): ?>
            <th class="center">
                <?=$key?>
            </th>
            <?php endforeach; ?>
        </tr>
        <?php foreach($grille as $key => $case): ?>
        <tr>
            <td>
                <?=$key?>
            </td>
            <?php foreach($case as $value): ?>
            <td 
            class="cell-bataillenavale center" 
            style=" width: 10%; 
                    border: solid red 1px; 
                    background-color: <?php echo ($value == 1) ? "#777" : "" ; ?>">
                <?=$value?>
            </td>
            <?php endforeach; ?>
        </tr>
        <?php endforeach; ?>
    </table>
</div>
<div class="row">
    <form method="post" action = "index.php?page=bataillenavale_v2">
        <div class="input-field col s4">
            <select name="x">
                <?php foreach($grille[1] as $key => $value): ?>
                <option value="<?=$key?>"><?=$key?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="input-field col s4">
            <select name="y">
                <?php foreach($grille as $key => $value): ?>
                <option value="<?=$key?>"><?=$key?></option>
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




