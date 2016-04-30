<?php
// Start the session
session_start();
	$db = mysqli_connect('mysql.hostinger.in','u727367698_root','shayanshadab2016','u727367698_camp');

	$username = $_POST['username'];
	$password = $_POST['password'];
	$password = md5($password);

	$query = mysqli_query($db, "SELECT * FROM signupinfo WHERE username = '$username'") or die(mysqli_error());

	if($row = mysqli_fetch_array($query)) {

		$fetchpass = (strlen($password) > 20) ? substr($password, 0, 20) : $password;
		if($row['password'] == $fetchpass){
			$_SESSION['user_id'] = $row['signup_sr'];
                        $_SESSION['name'] = $row['name'];
			$_SESSION['college'] = $row['college'];
			$_SESSION['branch'] = $row['branch'];
			$_SESSION['year'] = $row['year'];
			header("Location: ../userhome/index.html");
		}
		else {
echo '<script type="text/javascript">'; 
echo 'alert("Wrong password entered");'; 
echo 'window.location.href = "index.html";';
echo '</script>';
		}
	}
	else {
echo '<script type="text/javascript">'; 
echo 'alert("No user with this username found");'; 
echo 'window.location.href = "index.html";';
echo '</script>';
	}
?>
