<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.css" media="screen,projection" />

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>

    <!--header navbar-->
    <div class="navbar-fixed" >
        <nav class="blue-grey darken-1">
            <div class="nav-wrapper">
                <a href="#!" class="brand-logo">
                    <img src="asset/afpa_logo_1.png"></img>
                </a>
                <ul class="right hide-on-med-and-down">
                    <li><a href="index.php">Accueil</a></li>
                    <li><a href="index.php?page=exercice2">Exercice 2</a></li>
                    <li><a href="index.php?page=exercice4">Exercice 4</a></li>
                </ul>
            </div>
        </nav>
    </div>
    <div class="container">
        <!--content goes here-->
       <?php
       if(empty($_GET['page'])){
           require_once 'php/accueil.php';
       } else {
           if($_GET['page'] == 'exercice2'){
               require_once 'php/exercice2.php';
           } 
           else if($_GET['page'] == 'exercice4'){
               require_once 'php/exercice4.php';
           }
       }
       ?>
    </div>
    

    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.js"></script>
    <script>
         $(document).ready(function() {
            $('select').material_select();
         });
    </script>
</body>

</html>