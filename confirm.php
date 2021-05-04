
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Confirmation</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
</head>
<body>
	<div class="container" style="margin-top: 100px;">
		<div class="row justify-content-center">
			<div class="col-md-6 col-md-offset-3" align="center">

				<img src="images/logo.png"><br><br>
<?php



	function redirect() {
		header('Location: register.php');
		exit();
	}

	if (!isset($_GET['email']) || !isset($_GET['token'])) {
		redirect();
	} else {
		$con = new mysqli('localhost', 'S0329939', 'BenchaterMarouane2020', 'S0329939');

		$email = $con->real_escape_string($_GET['email']);
		$token = $con->real_escape_string($_GET['token']);

		$sql = $con->query("SELECT UserId FROM Users WHERE email='$email' AND token='$token' AND verified=0");

		if ($sql->num_rows > 0) {
			$con->query("UPDATE Users SET verified=1, token='' WHERE email='$email'");
			echo 'Your email has been verified!';
		} else
			redirect();
	}

?>

<p class="text-center">you can now <a href="login.php">Login</a></p>
				</form>

			</div>
		</div>
	</div>
</body>
</html>