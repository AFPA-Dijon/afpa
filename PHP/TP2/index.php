<!DOCTYPE html>
<html>

<head>
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.css" media="screen,projection" />

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>

    <!--header navbar-->
    <div class="navbar-fixed">
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
    
    <!--content goes here-->
   <?php
   var_dump($_GET);
   if(empty($_GET['page'])){
       include_once 'php/accueil.php';
   } else {
       if($_GET['page'] == 'exercice2'){
           include_once 'php/exercice2.php';
       } 
       else if($_GET['page'] == 'exercice4'){
           include_once 'php/exercice4.php';
       }
   }
   ?>

    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.js"></script>
</body>

</html>