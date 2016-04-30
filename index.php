<?php
    session_start();
	if(isset($_SESSION['user_id'])){
		header("Location: userhome/index.html");
	}
	else {
		header("Location: land/index.html");
	}
?>
