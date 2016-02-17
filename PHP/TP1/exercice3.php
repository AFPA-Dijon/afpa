<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Factorielle</title>
</head>
<body>
    <table>
        <?php $f = 1;  for ($i = 2; $i <= 30; $i++): ?>
        <tr>
            <td> <?= $i ?> </td>
            <td> <?= $f*=$i ?></td>
        </tr>
        <?php endfor; ?>
    </table>
    
    <?php
    $f = 1;
    echo "<table>";
    for ($i = 0; $i <= 30; $i++) {
         echo "<tr>";
         echo "<td> $i </td>";
         if($i == 0){
             echo "<td> $i </td>";
         }
         else {
             $f *= $i;
             echo "<td> $f </td>";
         }
         echo "</tr>";
    }
    echo "</table>";
    
    ?>
</body>
</html>