<?php 
	session_start();
	include '../connect.php';
	// getting variables from bookcab page
	if (isset($_POST['txtSource'])) 
	{ 
		$source = $_POST['txtSource'];
		$destin = $_POST['txtDestination'];
		$fare = $_POST['fare1'];
		$timereq = $_POST['timeinsec'];
		$timereq = $timereq + 250;
		$timez = (int)$timereq;		
	} 

	date_default_timezone_set("Asia/Kolkata");
	$timestamp1 = date("Y-m-d H:i:s");
	$timestamp = strtotime($timestamp1);
	$status = "0";

	// checking if drivers are available
	$check_avail = "SELECT * FROM `drivers` WHERE ('".$timestamp."' - `bookedat`) > `timereq`";
	$res_drivers = mysqli_query($connect, $check_avail);	
	$driver_avail = mysqli_fetch_array($res_drivers);

	if(!$driver_avail)
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
			  		<h4 class="alert-heading">BOOKING UNSUCCESSFUL</h4>
			 		<p>Currently there are no drivers available, please try again later!</p>
			  		<hr>
			  		<p class="mb-0"><a href="index.php">Home</a></p><br>
				</div>
			</div>
		</body>
		</html>
	';

	}
	else
	{
		$driveravail = $driver_avail['car_no'];
		$sql_insert = 'UPDATE `drivers` SET `bookedat`="'.$timestamp.'",`timereq`="'.$timez.'" WHERE car_no = "'.$driver_avail['car_no'].'"';
		mysqli_query($connect, $sql_insert);	

		$update_rides = "INSERT INTO `rides` (`source`, `destin`, `timestamp1`, `unixtime`, `mobile`,`fare`,`driverid`,`drivername`,`driverno`,`carno`,`status`) VALUES ('".$source."', '".$destin."', '".$timestamp1."', '".$timestamp."', '".$_SESSION['mobile']."', '".$fare."', '".$driver_avail['id']."', '".$driver_avail['name']."', '".$driver_avail['mobile']."', '".$driver_avail['car_no']."', '".$status."');";
		$rides_updated = mysqli_query($connect, $update_rides);

		$_SESSION['dname'] = $driver_avail['name'];
		$_SESSION['dcontact'] = $driver_avail['mobile'];
		$_SESSION['dcarno'] = $driver_avail['car_no'];

		echo"<script type='text/javascript'>
			alert('Driver will be arriving in 10 Minutes!');
	    	window.location.href = 'index.php';
	    	</script>";	
	}


?>