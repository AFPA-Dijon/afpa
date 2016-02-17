<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Fonctions</title>
</head>
<body>
    <?php
    include_once "fonctionshelper.php";
    
    $val1 = 3;
    $val2 = 4;
    var_dump(maFonction($val1, $val2));
    
    var_dump(fonctionSansRetour($val1, $val2));
    ?>
    
</body>
</html>