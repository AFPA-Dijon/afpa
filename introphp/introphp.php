<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Exemple php</title>
    <link rel="stylesheet" href="styles.css" type="text/css" />
</head>
<body>
    <?php
    $villes = array('Barcelone', 'Atlanta', 'Sydney', 'Athenes', 'Pekin', 'Londres', 'Rio');
    $annee = 1992;
    ?>
    <table>
        <?php for($i = 0; $i < count($villes); $i++): ?>
    
            <?php if($i%2 == 0): ?>
                <tr class="lightgray">
            <?php else: ?>
                <tr>
            <?php endif; ?>
            <td>Olympiades</td>
            <td><?= $annee ?></td>
            <td><?= $villes[$i] ?></td>
            </tr>
        <?php $annee+=4; endfor; ?>
    </table>
    
    
    <?php

    echo "Hello world"." texte concatene"."<br />";
    print_r(array('1', '2', '3'));
    
    /*Affichage comme dans l'exercice 4 du TP2 html*/
    $villes = array('Barcelone', 'Atlanta', 'Sydney', 'Athenes', 'Pekin', 'Londres', 'Rio');
    $annee = 1992;
    for($i = 0; $i < count($villes); $i++){
        echo "Olympiades ".$annee." ".$villes[$i]. "<br />";
        $annee += 4;
    }
    
    $annee = 1992;
    
    echo "<table>";
    for($i = 0; $i < count($villes); $i++){
        if($i%2 == 0){
            echo '<tr class="lightgray">';
        } else {
            echo "<tr>";
        }
        echo "<td>Olympiades</td>";
        echo "<td>".$annee."</td>";
        echo "<td>".$villes[$i]."</td>";
        echo "</tr>";
        $annee += 4;
    }
    echo "</table>";
    
    
    
    /*difference entre simple et double quote*/
    /*Avec simple quote: interprétation des variables php*/
    $prenom = 'Sami';
    echo "Bonjour $prenom <br />";
    echo 'Bonjour $prenom <br />';
    
    /*affichage d'un résultat*/
    echo "<br />". (1+2+3)*2;
    
    /*arithmétique*/
    echo 1+1;//addition
    echo 1*1;//multiplication
    echo 1-1;//soustraction
    echo 1/1;//division
    echo 4%2;//modulo
    
    
    /*affectation*/
    $variable = 5; //passage de la valeur 5
    $variable += 5;//incrémentation de 5
    $variable -= 5;//soustraction de 5
    $variable *= 5;//multiplication par 5
    $variable /= 5;//division par 5
    
    echo '<br />';
    
    //concatene à la suite de la chaine de caractères contenue dans $variable
    $variable = "texte";
    $variable .= " +un texte additionnel";
    echo $variable;
    
    echo '<br />';
    /*operateurs logiques, comparateurs*/
    echo 1==1;//affiche "1"
    echo '<br />';
    echo 1==2;//affiche rien car c'est faux
    echo '<br />';
    echo 1==1.0;//affiche "1" car ils ont la même valeur
    echo '<br />';
    echo '1'==1.0;//la chaine "1" est équivalente à l'entier 1.0
    echo '<br />';
    echo '1'=='1.0';//même valeur numérique contenue dans les deux chaînes, le test est positif
    
    
    echo '<br />';
    /*operateur ===, n'effectue pas de conversion de type comme ==
        plus performant mais pas les mêmes résultats*/
    echo 1===1;//true
    echo '<br />';
    echo 1===2;//false
    echo '<br />';
    echo 1===1.0;//pas les mêmes types donc false
    echo '<br />';
    echo '1'===1.0;//pas les mêmes types donc false
    echo '<br />';
    echo '1'==='1.0';//les deux chaînes ne sont pas égales donc false
    
    echo '<br />';
    
    /*operateur ternaire*/
    $var1 = 1;
    $var2 = 2;
    echo ($var1 == $var2) ? 'vrai': 'faux';//affiche faux
    
    /*isset vérifie l'existence d'une variable*/
    echo '<br />';
    echo isset($villes[8]) ? 'vrai': 'faux';//affiche faux parce que $villes[8] est vide
    
    /*empty vérifie que la variable existe et n'est pas vide
    cad empty fait aussi un isset*/
    $tab = array("1", 2, "3", 4.654);
    $tab = ["0", 2, "", 4.654, true, 0, -1];
    
    echo '<br />';
    echo empty($tab[0]) ? 'vrai': 'faux';
    
    echo '<br />';
    echo '1'+ $var1;
    
    /*operateurs de bits*/
    if( $var1 != $var2 || !isset($var3) ){
        echo '<br />';
        echo "VRAI";
    }
    /*traduire l'expression précédente avec une condition ternaire . qq?*/
    
    
    ?>

</body>
</html>
