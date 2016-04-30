<?php
	session_start();
	$user_id = $_SESSION['user_id'];

	$db = mysqli_connect('mysql.hostinger.in','u727367698_root','shayanshadab2016','u727367698_camp') or die('Error');

		$query = "SELECT * FROM mess_data WHERE signup_sr='$user_id'";
		$result = mysqli_query($db, $query);
		$r = mysqli_fetch_assoc($result);
		echo json_encode($r);
?>
