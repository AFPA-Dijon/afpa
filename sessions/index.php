<?php
session_start();
if(!empty($_POST['email']) && !empty($_POST['password'])){
    extract($_POST);
    $password = sha1($password);
    
    mysql_connect('localhost', 'sami', 'password');
    mysql_select_db('siteweb');
    $sql = " SELECT * FROM users WHERE email = '$email' AND password = '$password' ";
    $requete = mysql_query($sql);
    if(mysql_num_rows($requete) == 1){
        $_SESSION['email'] = $email;
        header("Location: pageprivee.php");
    }
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Demonstration sessions</title>
</head>
<body>
    <form method = "post" action = "index.php">
        <input type="text" name="email"/>
        <input type="text" name="password"/>
        <input type="submit" value="Submit"/>
    </form>
</body>
</html>