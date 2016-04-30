<?php
// Start the session
session_start();
$_SESSION['username'] = $_POST['username'];
$_SESSION['email'] = $_POST['email'];
$_SESSION['password'] = $_POST['password'];
$_SESSION['password2'] = $_POST['password2'];
?>
<?php    
header('Location: up2.html');    
?>