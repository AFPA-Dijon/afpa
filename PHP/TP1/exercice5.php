<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Nombres parfaits</title>
</head>
<body>
    <?php
    $nombre = 211;
    $subdiviseur = 0;
    for ($i = $nombre - 1 ; $i > 0 ; $i--) {
         if ($nombre % $i == 0) { 
             //si nombre est divisible par $i
             $subdiviseur += $i;
         }
    }
    if ($subdiviseur == $nombre) 
        echo "Le nombre $nombre est parfait";
    else
        echo "Le nombre $nombre n'est pas parfait";
        
    ?>
</body>
</html>