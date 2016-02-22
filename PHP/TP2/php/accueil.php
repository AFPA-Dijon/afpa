<?php
function valid($email, $password, $users){
     $errors = array();
     if(empty($email) || empty($password)){
        $errors['empty'] = "Veuillez saisir les deux champs";
     } else {
         
         if( !isset($users[$email]) ){
             $errors['email'] = "Accès interdit, compte inexistant";
         } else { 
             
             if( $users[$email]['password'] !== $password ){
                $errors['password'] = "Accès interdit, le compte et le mot de passe ne correspondent pas";
             }
         }
     }
     return $errors;
  }

$users = [
    'sam@provider.com' => ['nom' => 'Sam', 'password' => 'azer'],
    'kurt@provider.com' => ['nom' => 'Kurt', 'password' => 'reaz']
];
$errors = valid($_POST['email'], $_POST['password'], $users);
    
?>
        
   <form class="col s12 " action="index.php?page=accueil" method="post">
      <div class="row">
        <div class="input-field col s12 m6 l6">
          <input name="email" type="email" class="validate <?php echo !empty($_POST) && !empty($errors)?'invalid': '' ?>">
          <label for="email">Email</label>
        </div>
      </div>
    <?php if( !empty($_POST) &&  !empty($errors['email']) ):?>
      <div class="row">
        <div class="col s12  m6 l6">
            <h6 class="error-message"><?=$errors['email']?></h6>
        </div>
      </div>
      <?php endif;?>
      <div class="row">
        <div class="input-field col s12 m6 l6">
          <input name="password" type="password" class="validate <?php echo !empty($_POST) && !empty($errors)?'invalid': '' ?>">
          <label for="password">Password</label>
        </div>
      </div>
      <?php if( !empty($_POST) && !empty($errors['password']) ):?>
      <div class="row">
        <div class="col s12  m6 l6">
            <h6 class="error-message"><?=$errors['password']?></h6>
        </div>
      </div>
      <?php endif;?>
        <button class="btn waves-effect waves-light" type="submit" name="action">Se connecter
        </button>
    </form>
    
    
    <?php  if(!empty($_POST) &&  !empty($errors)): ?>
     <div class="card-panel teal lighten-2">
         <h6>Accès refusé</h6>
     </div>
    <?php elseif(!empty($_POST) &&  empty($errors)): ?> 
    <div class="card-panel teal lighten-2">
         <h6>
         <?php
         echo "Bienvenue, ". $users[ $_POST['email'] ][ 'nom' ];
         header('Location: index.php?page=exercice2'); die;
         ?>
         </h6>
     </div>
    <?php endif; ?>