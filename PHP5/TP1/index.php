<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP5 - TP1</title>
</head>
<body>
    <?php
    require_once 'Form.php';
    var_dump($_POST);
    $form = new Form($_POST);
    
    echo $form->openForm('index.php', 'post');
    echo $form->openFieldSet('Mon formulaire');
    
    echo $form->inputText("Nom", "nom", "text");
    echo $form->inputText("Email", "email", "email");
    echo $form->inputText("Password", "password", "password");
    $options = [
        "h" => "Homme",
        "f" => "Femme"
    ];
    echo $form->inputSelect("Genre", "genre", $options );
    echo $form->submit("OK");
    echo $form->closeFieldSet();
    echo $form->closeForm();
    
   
    
    
    ?>
</body>
</html>