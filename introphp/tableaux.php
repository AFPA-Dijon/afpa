 <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tableaux</title>
</head>
<body>
    <?php
    $tab = array("1", "2", 3, true);
    $tab = ["1", "2", 3, true];
    $tab = array( "Chaine", array("1", [1, 2, 2], 3, true), 3);
    /*var_dump($tab);*/
    
    $tab = ["nom" => "Jebrane", "prenom" => "Sami", "age" => 30];
    /*var_dump($tab);
    
    echo "<br />" . $tab['nom'];*/
    
    $tab = [
        0 => [ "nom" => "Sami", "age" => 30],
        1 => [ "nom" => "john", "age" => 31],
        2 => [ "nom" => "Benjamin", "age" => 26]
    ];
    /*var_dump($tab);
    echo $tab[0]["nom"];*/
    
    $tab1 = ["1", "2", 3];
    $tab2 = ["1", "2", "3"];
    /*var_dump($tab1 != $tab2);*/
    
    $tab1["new"] = "nouvelle valeur";
    var_dump($tab1);
    
    $valeur = 3;
    $valeur = array("valeur" => 3);
    var_dump($valeur);
    
    
    
    ?>
    <table>
        <th>ID</th>
        <th>Nom</th>
        <th>Age</th>
       
        <?php foreach ($tab as $key => $valeur): ?>
        <tr>
            <td><?= $key; ?></td>
            
            <?php foreach ($valeur as $valeur2): ?>
            <td><?= $valeur2; ?></td>
            <?php endforeach; ?>
            
        </tr>
        <?php endforeach; ?>
    </table>
    
</body>
</html>