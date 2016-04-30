<?php
session_start();/*
$returnValue['uname'] = $_SESSION['name'];
$returnValue['ucollege'] = $_SESSION['college'];
$returnValue['ubranch'] = $_SESSION['branch'];
$returnValue['uyear'] = $_SESSION['year'];*/

$db = mysqli_connect('mysql.hostinger.in','u727367698_root','shayanshadab2016','u727367698_camp') or die('Error');
$userid = $_SESSION['user_id'];
$result = mysqli_query($db, "SELECT * FROM signupinfo WHERE signup_sr = '$userid'") or die(mysqli_error());
$r = mysqli_fetch_assoc($result);
echo json_encode($r);
?>