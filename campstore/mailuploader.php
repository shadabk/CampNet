<?php
ini_set("SMTP", "smtp.gmail.com");
ini_set("sendmail_from", "campusnetwork16@gmail.com");
$upid = $_REQUEST['id'];
$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM signupinfo WHERE signup_sr=$user_id";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_array($query);
$fromemail = $row['emailID'];

$query = "SELECT * FROM signupinfo WHERE signup_sr=$upid";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_array($query);
$email = $row['emailID'];
$to=$email;
$subject="Buyer contacted you";
$header="from : ";
$message="Someone is interested in buying your book. Contact him at : ". $fromemail;
$sentmail = mail($to,$subject,$message,$header);
echo "Mail sent";
?>
