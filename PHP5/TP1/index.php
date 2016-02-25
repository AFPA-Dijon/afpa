<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP5 - TP1</title>
    <!--Import Google Icon Font-->
    <link href="//fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css" media="screen,projection" />
</head>
<body>
    
    <div class="container">
    <?php
    /*require_once 'Form.class.php';
    $form = new Form($_POST);
    $form->valid();
    
    echo $form->openForm('index.php', 'post');
    
    echo $form->openFieldSet('Mon formulaire');
    
    echo $form->inputText("Nom", "name", "text");
    
    echo $form->inputText("Email", "email", "email");
    
    echo $form->inputText("Password", "password", "password");
    
    echo $form->inputText("Tel", "phone", "text");
    $options = [
        "h" => "Homme",
        "f" => "Femme"
    ];
    echo $form->inputSelect("Genre", "genre", $options );
    echo $form->submit("OK");
    echo $form->closeFieldSet();
    echo $form->closeForm();*/
    
    
    require_once 'MaterialForm.class.php';
    var_dump($_POST);
    $form = new MaterialForm($_POST);
    $form->valid();
    echo $form->openForm('index.php', 'post', 12);
    echo $form->inputText("Nom", "name", "text");
    echo $form->submit("OK");
    echo $form->closeForm();
    ?>
    
    </div>
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
</body>
</html>