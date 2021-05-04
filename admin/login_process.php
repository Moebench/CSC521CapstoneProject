<?php
	session_start();
	if (isset($_POST)) {
		if($_POST['user_name'] == 'admin' && $_POST['password'] == '123456') {
			$_SESSION['is_login'] = "yes";
			header('Location: index.php');
			exit;
		}

		else {
			echo "Nooooo";
			$_SESSION['error_admin_login'] = "Username Password Mismatch. Please Retry.";
			header('Location: login.php');
			exit;
		}
	} else {
		header('Location: login.php');
	}
?>