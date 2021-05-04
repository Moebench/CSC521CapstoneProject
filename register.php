<?php
	
	$msg = "";
	use PHPMailer\PHPMailer\PHPMailer;

	if (isset($_POST['submit'])) {
		$con = new mysqli('localhost', 'S0329939', 'BenchaterMarouane2020', 'S0329939');

		$name = $con->real_escape_string($_POST['username']);
		$email = $con->real_escape_string($_POST['email']);
		$password = $con->real_escape_string($_POST['password']);
		$cPassword = $con->real_escape_string($_POST['cPassword']);

		if ($name == "" || $email == "" || $password != $cPassword)
			$msg = "Invalid input, please try again";
		else {
			$sql = $con->query("SELECT UserId FROM Users WHERE email='$email'");
			if ($sql->num_rows > 0) {
				$msg = "This email already exists";
			} else {
				$token = 'qwertzuiopasdfghjklyxcvbnmQWERTZUIOPASDFGHJKLYXCVBNM0123456789!$/()*';
				$token = str_shuffle($token);
				$token = substr($token, 0, 10);

				$hashedPassword = password_hash($password, PASSWORD_BCRYPT);

				$con->query("INSERT INTO Users (username,email,password,verified,token)
					VALUES ('$name', '$email', '$hashedPassword', '0', '$token');
				");

                include_once "PHPMailer/PHPMailer.php";

                $mail = new PHPMailer();
                $mail->setFrom('m1.benchater@gmail.com');
                $mail->addAddress($email, $name);
                $mail->Subject = "Please verify email!";
                $mail->isHTML(true);
                $mail->Body = "
                    Please click on the link below:<br><br>
                    
                    <a href='http://weblab.salemstate.edu/~S0329939/MB/confirm.php?email=$email&token=$token'>Click Here</a>
                ";

                if ($mail->send())
                    $msg = "You have been registered! Please verify your email!";
                else
                    $msg = "Something wrong happened! Please try again!";
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
    <title>Register</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
</head>
<body>
	<div class="container" style="margin-top: 100px;">
		<div class="row justify-content-center">
			<div class="col-md-6 col-md-offset-3" align="center">

				<img src="images/logo.png"><br><br>

				<?php if ($msg != "") echo $msg . "<br><br>" ?>

				<form method="post" action="register.php">
					<input class="form-control" name="username" placeholder="Username"><br>
					<input class="form-control" name="email" type="email" placeholder="Email"><br>
					<input class="form-control" name="password" type="password" placeholder="Password"><br>
					<input class="form-control" name="cPassword" type="password" placeholder="Confirm Password"><br>
					<input class="btn btn-primary" type="submit" name="submit" value="Register">
					
					<p class="text-center">Already a member? <a href="login.php">Login</a></p> 
				</form>

			</div>
		</div>
	</div>
</body>
</html>