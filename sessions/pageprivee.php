<?php
session_start();
extract($_SESSION);
if(!isset($email)){
    header("Location: index.php");
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Page privée</title>
</head>
<body>
    Ceci est la page privée<br />
    <?php echo isset($email)? "Bienvenue ". $email :""?>
    <a href="deconnexion.php">Se déconnecter</a>
    
</body>
</html>