<?php
include 'connect.php';
include 'nav.php';
$name = $_POST['Name1'];
$mobile = $_POST['Mobile1'];
$email = $_POST['Email1'];
$password = $_POST['Password1'];
$a = (int)$mobile;

$sql_users = "INSERT INTO `users` (`name`, `mobile`, `email`, `password`) VALUES ('".$name."', '".$mobile."', '".$email."', '".$password."');";
$res_users = mysqli_query($connect, $sql_users);
if($res_users== true)
{
		echo'
	<!DOCTYPE html>
	<html>
	<head>
		<title>Registration Successful</title>
	</head>
	<body>
		<div class="container-fluid" style="padding-top: 100px";>
			<div class="alert alert-success" role="alert">
		  		<h4 class="alert-heading">REGISTRATION SUCCESSFUL!</h4>
		 		<p>Your registration was successful.</p>
		  		<hr>
		  		<p class="mb-0">Click on the link to login.<a href="index.php">Login</a></p>
			</div>
		</div>
	</body>
	</html>';
}
else
{
	echo'
	<!DOCTYPE html>
	<html>
	<head>
		<title>Registration Successful</title>
	</head>
	<body>
		<div class="container-fluid" style="padding-top: 100px";>
			<div class="alert alert-danger" role="alert">
		  		<h4 class="alert-heading">REGISTRATION UNSUCCESSFUL!</h4>
		 		<p>Your registration was unsuccessful, or mobile no. is already registered</p>
		  		<hr>
		  		<p class="mb-0">Click on the link to try again.<a href="register.php">Try Again</a></p><br>
		  		<p class="mb-0">Click on the link to login.<a href="index.php">Login</a></p>
			</div>
		</div>
	</body>
	</html>';
}

?>