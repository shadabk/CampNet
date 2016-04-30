<?php
  session_start();
  $name = $_POST['name'];
  $email = $_POST['email'];
  $note = $_POST['note'];
  ini_set("SMTP", "smtp.gmail.com");
  ini_set("sendmail_from", "campusnetwork16@gmail.com");
  $to="campusnetwork16@gmail.com";
  $subject="Feedback:".$email." Name:".$name;
  $header="From:".$email." SessionName: ".$_SESSION['name'];
  $message=$note;
  $sentmail = mail($to,$subject,$message,$header);
  echo "feedback submitted";
?>
