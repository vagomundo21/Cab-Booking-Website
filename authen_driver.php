<?php
include 'connect.php';

// TODO:
// Use HTML & CSS to beautify this page.
// If a user directly visits this page, he should see an error message and be redirected to Login page
$mobile = $_POST['Mobiled'];
$password = $_POST['Passwordd'];
$a = (int)$mobile;

// TODO ADVANCED:
// Secure password by storing MD5/SHA-512 hash in DB.
$sql_users = "SELECT * FROM `drivers` WHERE `mobile`='".$mobile."' AND `password`='".$password."'";

$res_users = mysqli_query($connect, $sql_users);
if(mysqli_num_rows($res_users) < 1)
{
	echo'
	<!DOCTYPE html>
	<html>
	<head>
		<link rel="icon" type="image/gif/png" href="icon0.png">
		<title>Authentication Failed!</title>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/css?family=Righteous|Montserrat:400i|Catamaran:700" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="main.css">
	</head>
	<body>
		<nav class="navbar navbar-light fixed-top lgblue">
			<a class="navbar-brand" href="index.php" style="font-family:Righteous";>
		    <i class="fas fa-car-alt"></i>
		    INDIEUBER
			</a>
		</nav>
		<div class="container-fluid" style="padding-top: 100px";>
			<div class="alert alert-danger" role="alert">
		  		<h4 class="alert-heading">AUTHENTICATON FAILED!</h4>
		 		<p>No user found with entered mobile no. and password combination. If you want to reset your password contact us.</p>
		  		<hr>
		  		<p class="mb-0">Click on the link to try again.<a href="index.php">Login</a></p><br>
			</div>
		</div>
	</body>
	</html>';

}
else
{
    $row_users = mysqli_fetch_array($res_users);
    session_start();
    $_SESSION['d_id'] = $row_users['id'];
    $_SESSION['d_name'] = $row_users['name'];
    header("Location: driverboard/index.php");
}
?>