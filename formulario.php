<?php 
session_start();
include('header.php');
$loginError = '';
if (!empty($_POST['username']) && !empty($_POST['pwd'])) {
    include ('Push.php');
    $push = new Push();
    $user = $push->loginUsers($_POST['username'], $_POST['pwd']); 
    if(!empty($user)) {
        $_SESSION['username'] = $user[0]['username'];
        header("Location:index.php");
    } else {
        $loginError = "Invalido el usuario o contraseña!";
    }
}

?>