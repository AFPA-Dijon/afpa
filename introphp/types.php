<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Types</title>
</head>
<body>
    <?php
    $chaine = "Une chaine de caractères avec \"guillements\" ";
    $chaine = 'Une chaine de caractères avec "guillements" ';
    echo $chaine{2}; //accéder au nieme caractère dans la chaine
    echo "<br />" . substr($chaine, 0, 3);
    
    $var1 = 1.4;
    $var2 = 1.0;
    echo "<br />" . $var1 . " " . $var2;
    var_dump($var1);
    var_dump($var2);
    
    
    ?>
</body>
</html>