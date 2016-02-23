<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <!--Import Google Icon Font-->
    <link href="//fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.css" media="screen,projection" />
    <!--Custom css-->
    <link type="text/css" rel="stylesheet" href="css/app.css" media="screen,projection" />
    <!--Let browser know website is optimiz ed for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>

    <!--header navbar-->
    <div class="navbar-fixed" >
        <nav class="blue-grey darken-4">
            <div class="container">
            <div class="nav-wrapper">
                <a href="#!" class="brand-logo">
                    <img src="asset/afpa_logo_white_50x50.png"></img>
                </a>
                <?php if(isset($_GET['page']) && $_GET['page'] != 'accueil'): ?>
                <ul class="right hide-on-med-and-down">
                    <li><a href="index.php">Accueil</a></li>
                    <li><a href="index.php?page=exercice2">Exercice 2</a></li>
                    <li><a href="index.php?page=exercice4">Exercice 4</a></li>
                    <li><a href="index.php?page=bataillenavale">Bataille navale v1</a></li>
                    <li><a href="index.php?page=bataillenavale_v2">Bataille navale_v2</a></li>
                </ul>
                <?php endif; ?>
            </div> </div>
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
           else if($_GET['page'] == 'bataillenavale'){
               require_once 'php/bataillenavale.php';
           }
           else if($_GET['page'] == 'bataillenavale_v2'){
               require_once 'php/bataillenavale_v2.php';
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