<?php

$db = mysqli_connect('mysql.hostinger.in','u727367698_root','shayanshadab2016','u727367698_camp');
$query = "CREATE TABLE IF NOT EXISTS signupinfo (
  timestamp INT(15),
  signup_sr INT(10) NOT NULL AUTO_INCREMENT,
  mis INT(15) NULL,
  name VARCHAR(25) DEFAULT NULL,
  college VARCHAR(45) DEFAULT NULL,
  branch VARCHAR(45) DEFAULT NULL,
  year INT(10) DEFAULT NULL,
  gender VARCHAR(10) DEFAULT NULL,
  age INT(5) DEFAULT NULL,
  contact INT(15) DEFAULT NULL,
  username VARCHAR(20) DEFAULT NULL,
  emailID VARCHAR(45) DEFAULT NULL,
  password VARCHAR(20) DEFAULT NULL,
  ads_count INT(5) DEFAULT NULL,
  PRIMARY KEY (signup_sr)
) ENGINE=InnoDB";
mysqli_query($db, $query);

$passkey=$_GET['passkey'];
$query = "SELECT * FROM tempsignupinfo WHERE passkey = '$passkey'";
$result = mysqli_query($db, $query);


if($result){
	$query = "INSERT INTO signupinfo(timestamp, signup_sr, mis, name, college, branch, year, username, emailID, password, ads_count) SELECT timestamp, signup_sr, mis, name, college, branch, year, username, emailID, password, ads_count FROM tempsignupinfo WHERE passkey = '$passkey'";
	$data = mysqli_query($db, $query);
}
else {
	echo "Wrong Confirmation code";
}

	// if successfully moved data from table"temp_members_db" to table "registered_members" displays message "Your account has been activated" and don't forget to delete confirmation code from table "temp_members_db"
	if($data){

	echo "Your account has been activated";

	// Delete information of this user from table "temp_members_db" that has this passkey
	$sql3="DELETE FROM tempsignupinfo WHERE passkey = '$passkey'";
	$result3 = mysqli_query($db, $sql3);

	}
	
?>