<?php 
	session_start();
	include '../connect.php';
	// getting variables from bookcab page
	if (isset($_POST['ride_id'])) 
	{ 
		$ride_id1 = $_POST['ride_id'];	
		$ride_id = (int)$ride_id1;
	} 

	date_default_timezone_set("Asia/Kolkata");
	$timestamp1 = date("Y-m-d H:i:s");
	$timestamp = strtotime($timestamp1);
	$arrive = 420;
	$status = "0";

	// checking if rides is present
	$check_avail = "SELECT * FROM `rides` WHERE `ride_no`='".$ride_id."' AND ('".$timestamp."' - `unixtime`) < '".$arrive."' AND `status`='".$status."'";
	$res_rides = mysqli_query($connect, $check_avail);	
	$rides_avail = mysqli_fetch_array($res_rides);

	if(!$rides_avail)
	{
		
	echo'
		<!DOCTYPE html>
		<html>
		<head>
			<link rel="icon" type="image/gif/png" href="icon0.png">
			<title>Cancelation Failed!</title>
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
			  		<h4 class="alert-heading">CANCELATION UNSUCCESSFUL</h4>
			 		<p>Please enter correct ride ID! OR Ride cancelled by rider/you.</p>
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
		$timez = 0;
		$cancelled = "2";
		$sql_insert = "UPDATE `drivers` SET `timereq`='".$timez."' WHERE `id` = '".$_SESSION['d_id']."'";
		mysqli_query($connect, $sql_insert);	

		$update_rides = "UPDATE `rides` SET `status`= '".$cancelled."' WHERE `ride_no` = '".$ride_id."'";
		$rides_updated = mysqli_query($connect, $update_rides);

		echo"<script type='text/javascript'>
			alert('CANCELATION SUCCESSFUL!');
	    	window.location.href = 'index.php';
	    	</script>";	
	}


?>