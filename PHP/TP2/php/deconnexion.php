<?php
session_start();
if(isset($_SESSION['Auth'])){
    $_SESSION = array();
    session_destroy();
}
header("Location: index.php");
?>