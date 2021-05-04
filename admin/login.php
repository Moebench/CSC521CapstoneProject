<?php
  session_start();
  if(isset($_SESSION['is_login']) && $_SESSION['is_login'] =='yes') {
    header('Location:index.php');
    exit;
  }
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Admin Login</title>
    </head>
	<body>

	<div class="container contact">
		<div class="form-div">
			<h1>Admin Login</h1>
			<form id="admin_login_form" class="p-0" action="login_process.php" method="post">
				<?php
				if(isset($_SESSION['error_admin_login'])) {
				    echo "<div class='text-center'>";
				    echo "<div class='alert alert-danger'>".$_SESSION['error_admin_login']."</div>";
				    echo "</div>";
				    unset($_SESSION['error_admin_login']);
				}
				?>
				<input type="text" name="user_name" class="form-control cstm-form-control1" placeholder="User Name*" required>
				<input type="password" name="password" class="form-control cstm-form-control1" placeholder="Password*" required>
				<button type="submit" id="cf_submit_btn" class="m-t-0 send-msg">Login</button>
			</form>
			<div class="clearfix"></div>
		</div>
		<div class="clearfix"></div>
	</div>

