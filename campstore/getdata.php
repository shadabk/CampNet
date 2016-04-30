<?php
session_start();
$name = $_SESSION['name'];
$college = $_SESSION['college'];
$branch = $_SESSION['branch'];
$year = $_SESSION['year'];

	$db = mysqli_connect('mysql.hostinger.in','u727367698_root','shayanshadab2016','u727367698_camp') or die('Error');
	$query = "SELECT * FROM ads_list WHERE college='$college' and branch='$branch' and year=$year ORDER BY ad_sr DESC";

//echo json_encode($returnValue);

	$result = mysqli_query($db, $query);
	$i=0;
	while($r = mysqli_fetch_assoc($result)) {
	//	$r["link"] = "http://www.facebook.com";
		$rows[] = $r;
		$i = $i + 1;
     }
	 echo json_encode($rows);
?>
