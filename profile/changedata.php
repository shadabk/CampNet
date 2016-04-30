<?php
	session_start();
	$new_id = $_REQUEST['id'];
	$modtype = $_REQUEST['modtype'];
	$user_id = $_SESSION['user_id'];

	$db = mysqli_connect('mysql.hostinger.in','u727367698_root','shayanshadab2016','u727367698_camp') or die('Error');

	if(1){
		$query = "UPDATE signupinfo SET $modtype='$new_id' WHERE signup_sr='$user_id'";
		$data = mysqli_query($db, $query)or die(mysqli_error());
		if($data){
			echo $new_id;
		        return;
                }
	}
?>
