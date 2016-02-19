 <?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Page 3</title>
</head>
<body>
     <?php
     var_dump($_POST);
     
    if(isset($_POST['deco'])){
        session_destroy();
        $_SESSION = array();
    }
    
     var_dump($_SESSION);
    ?>
    
    <p> Nom: <?php echo $_SESSION['nom'] ?></p>
    <p> Email: <?php echo $_SESSION['email'] ?></p>
    <p>
         <form method="post" action = "testsession3.php">
            <input type="submit" name="deco" value="Deconnexion"/>
         </form>
    </p>
    
   
  
   
</body>
</html>