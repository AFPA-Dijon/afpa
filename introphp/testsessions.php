<?php
/*démarrage de la session*/
session_start();
$_SESSION['email'] = 'sam@provider.com';
$_SESSION['nom'] = 'Sam';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sessions</title>
</head>    
<body>
    <p>
        <?php
        var_dump($_SESSION);
        ?>
        <a href="testsession2.php">
             Accéder au profil
        </a>
    </p>
    
</body>
</html>