<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mes infos</title>
</head>
<body>
    <p> Nom: <?php echo $_SESSION['nom'] ?></p>
    <p> Email: <?php echo $_SESSION['email'] ?></p>
    
    <p>
        <a href="testsession3.php"> Page suivante</a>
    </p>
</body>
</html>