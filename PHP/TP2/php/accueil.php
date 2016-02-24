<?php
mysql_connect('localhost', 'sami', 'password');
mysql_select_db('siteweb');

function emailValid($email){
     $sql = " SELECT * FROM users WHERE email = '$email' ";
     $requete = mysql_query($sql);
     return mysql_num_rows($requete) >= 1;
}

function loginValid($email, $password){
     $password = sha1($password);
     $sql = " SELECT * FROM users WHERE email = '$email' AND password = '$password' ";
     $requete = mysql_query($sql);
     return mysql_num_rows($requete) == 1;
}

function valid($email, $password){
     $errors = array();
 
     if(empty($email) || empty($password)){
        $errors['empty'] = "Veuillez saisir les deux champs";
     } else {
         
         if( !emailValid($email) ){
             $errors['email'] = "Compte inexistant";
         } else { 
             
             if( !loginValid($email, $password) ){
                $errors['password'] = "Mauvais mot de passe";
             }
         }
     }
     return $errors;
  }

extract($_POST);
$errors = valid($email, $password);

if(isset($email) && isset($password) && empty($errors)){
    $_SESSION['Auth']['email'] = $email;
    header('Location: index.php?page=exercice2');
}

?>
<div class="row content-title">
    <h4 class="center blue-grey-text text-darken-1">Connexion</h4>
</div>
<form action="index.php" method="post">

    <div class="row">
        <div class="input-field col s12 m6 l6 offset-l3 offset-m3">
            <i class="material-icons prefix" >account_box</i>
            <input value="<?=$_POST['email']?>" name="email" type="email" class="validate <?php echo !empty($_POST) && !empty($errors)?'invalid': '' ?>">
            <label for="email">Email</label>
            
            <?php if( !empty($_POST) && !empty($errors[ 'email']) ):?>
            <br /><h6 class="center red-text error-message"><?=$errors['email']?></h6>
            <?php endif;?>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12 m6 l6 offset-l3 offset-m3">
            <i class="material-icons prefix" >security</i>
            <input name="password" type="password" class="validate <?php echo !empty($_POST) && !empty($errors)?'invalid': '' ?>">
            <label for="password">Password</label>
            
            <?php if( !empty($_POST) && !empty($errors[ 'password']) ):?>
            <h6 class="center red-text error-message"><?=$errors['password']?></h6> 
            <?php endif;?>
        </div>
    </div>
    <div class="row">
        <div class="col s6 offset-s3">
        </div>
    </div>
    <div class="row">
        <div class="col s12 center">
            <button class="btn waves-effect waves-light blue-grey darken-2" type="submit" name="action">Se connecter
            </button>
        </div>
    </div>

</form>
    
    
<?php  if(!empty($_POST) &&  !empty($errors)): ?>
<div class="card-panel red darken-3">
 <h5 class="grey-text text-lighten-5">Accès refusé</h5>
</div>
<?php endif;?>