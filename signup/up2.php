<?php
// Start the session
session_start();

$db = mysqli_connect('mysql.hostinger.in','u727367698_root','shayanshadab2016','u727367698_camp') or die('Error');


$query = "CREATE TABLE IF NOT EXISTS tempsignupinfo (

  timestamp INT(15),
  signup_sr INT(10) NOT NULL AUTO_INCREMENT,
  name VARCHAR(25) DEFAULT NULL,
  college VARCHAR(45) DEFAULT NULL,
  branch VARCHAR(45) DEFAULT NULL,
  year INT(10) DEFAULT NULL,
  mis INT(15) DEFAULT NULL,
  username VARCHAR(20) DEFAULT NULL,
  emailID VARCHAR(45) DEFAULT NULL,
  password VARCHAR(20) DEFAULT NULL,
  ads_count INT(5) DEFAULT NULL,
  passkey VARCHAR(32) DEFAULT NULL,
  PRIMARY KEY (signup_sr)
) ENGINE=InnoDB";

mysqli_query($db, $query);

ini_set("SMTP", "smtp.gmail.com");
ini_set("sendmail_from", "campusnetwork16@gmail.com");

$timestamp = time();
$fname = $_POST['name'];
$college = $_POST['college'];
$branch = $_POST['branch'];
$year = $_POST['year'];
$mis = $_POST['mis'];
$username = $_SESSION['username'];
$email = $_SESSION['email'];
$password = $_SESSION['password'];
$password2 = $_SESSION['password2'];
$ads_count = 0;
$confirm_code=md5(uniqid(rand()));

$password = md5($password);

if(isset($_POST['submit']))
{
	if(!empty($username)) {
		if(strcmp($password, $password2)) {
			$query = mysqli_query($db, "SELECT * FROM tempsignupinfo WHERE username = '$username' or emailID = '$email'") or die(mysqli_error());
			if(!($row = mysqli_fetch_array($query))){


				$query = "INSERT INTO tempsignupinfo (timestamp, name, college, branch, year, mis, username, emailID, password, ads_count, passkey) VALUES ($timestamp, '$fname', '$college', '$branch', $year, $mis, '$username', '$email', '$password', $ads_count, '$confirm_code')";
				$data = mysqli_query($db, $query)or die(mysqli_error());
				if($data)
				{
					$to=$email;
					$subject="Your CampNet confirmation link here";
					$header="from: campusnetwork16@gmail.com ";
					$message="Your Comfirmation link \r\n";
					$message.="Click on this link to activate your account \r\n";
					$message.="http://campnet.pe.hu/final/signup/confirm.php?passkey=$confirm_code";
					$sentmail = mail($to,$subject,$message,$header);
					echo "Check mailbox";

				}



			}
			else
			{
				if($row['username'] == $username) {
					echo "The username is taken up";
				}
				else{
					echo "We have already sent you a confirmation mail";
				}
			}
		}
		else{echo"Password incorrect";}
	}
}
?>
