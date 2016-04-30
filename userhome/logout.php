<?php
    session_start();
	if(isset($_SESSION['user_id'])){
		session_destroy();
		header("Location: ../land/index.html");
	}
	else {
		echo "Already logged out";
	}
?>