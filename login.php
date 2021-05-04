<?php
	
	$msg = "";

	if (isset($_POST['submit'])) {
		$con = new mysqli('localhost', 'S0329939', 'BenchaterMarouane2020', 'S0329939');

		$email = $con->real_escape_string($_POST['email']);
		$password = $con->real_escape_string($_POST['password']);

		if ($email == "" || $password == "")
			$msg = "Please enter your email and password";
		else {
			$sql = $con->query("SELECT UserId, password, verified FROM Users WHERE email='$email'");
			if ($sql->num_rows > 0) {
                $data = $sql->fetch_array();
                if (password_verify($password, $data['password'])) {
                    if ($data['verified'] == 0)
	                    $msg = "Please verify your email!";
                    else {
						$msg = "You have been logged in";
						header('location: home.php');
						exit();
                    }
                } else
	                $msg = "Wrong password";
			} else {
				$msg = "User not found, please register";
			}
		}
	}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Log In</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
</head>
<body>
	<div class="container" style="margin-top: 100px;">
		<div class="row justify-content-center">
			<div class="col-md-6 col-md-offset-3" align="center">

				<img src="images/logo.png"><br><br>

				<?php if ($msg != "") echo $msg . "<br><br>" ?>

				<form method="post" action="login.php">
					<input class="form-control" name="email" type="email" placeholder="Email"><br>
					<input class="form-control" name="password" type="password" placeholder="Password"><br>
					<input class="btn btn-primary" type="submit" name="submit" value="Log In">
					
					<p class="text-center">Not yet a member? <a href="register.php">Sign up now</a></p> 
				</form>

			</div>
		</div>
	</div>
</body>
</html>