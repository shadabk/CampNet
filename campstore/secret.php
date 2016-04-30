<?php

$db = mysqli_connect('mysql.hostinger.in','u727367698_root','shayanshadab2016','u727367698_camp');
$query = "CREATE TABLE IF NOT EXISTS ads_list (
  timestamp INT(15),
  ad_sr INT(11) NOT NULL AUTO_INCREMENT,
  title VARCHAR(40) DEFAULT NULL,
  author VARCHAR (100) DEFAULT NULL,
  edition INT(25) DEFAULT 1,
  description VARCHAR(300) DEFAULT NULL,
  image VARCHAR(100) DEFAULT NULL,
  price INT(10) DEFAULT NULL,
  uploader_id INT(25) DEFAULT NULL,
  upemail VARCHAR(30) DEFAULT NULL,
  college VARCHAR(45) DEFAULT NULL,
  branch VARCHAR(45) DEFAULT NULL,
  year INT(10) DEFAULT NULL,
  PRIMARY KEY (ad_sr)
) ENGINE=InnoDB";
$result = mysqli_query($db, $query);


if($result){
	$query = "INSERT INTO ads_list(timestamp, ad_sr, title, author, edition, description, image, price, uploader_id, upemail, college, branch, year) SELECT * FROM temp_ads_list";
	$data = mysqli_query($db, $query) or die(mysqli_error());
}
else {
	echo "Error";
}

	// if successfully moved data from table"temp_members_db" to table "registered_members" displays message "Your account has been activated" and don't forget to delete confirmation code from table "temp_members_db"
	if($data){

//	echo "Your account has been activated";

	// Delete information of this user from table "temp_members_db" that has this passkey
	$sql3="DELETE FROM temp_ads_list";
	$result3 = mysqli_query($db, $sql3);
  header("Location: index.html");
	}

?>
