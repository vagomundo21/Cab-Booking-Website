<?php
session_start();
include '../connect.php';
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="icon" type="image/gif/png" href="icon0.png">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Righteous|Montserrat:400i|Catamaran:700" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="main.css">

	<?php
	//include '../connect.php';
	// TODO:
	// Even if the user is not logged in, this page gets rendered with unhandled error.
	// Show error message and redirect the user to Login Page
	if(!isset($_SESSION['name'])){
	    echo "<script type='text/javascript'> alert('Please login first');
            window.location.href = '../index.php';
        </script>";
	    //exit();
	}
	?>
</head>
<body>
	<nav class="navbar navbar-expand-md fixed-top navbar-light lgblue">
		<a class="navbar-brand" href="../index.php" style="font-family:Righteous";>
	    <i class="fas fa-car-alt"></i>
	    INDIEUBER
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    		<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
		    <ul class="navbar-nav mr-auto">
		    	<li class="nav-item active">
		    		<a class="nav-item nav-link " href="index.php">HOME <span class="sr-only">(current)</span></a>
		    	</li>
		    	<li class="nav-item">
		        	<a class="nav-item nav-link" href="bookcab.php">BOOK YOUR RIDE</a>
		    	</li>
		    	<li class="nav-item">
		        	<a class="nav-item nav-link" href="prevrides.php">PREVIOUS RIDES</a>
		    	</li>
		    	<li class="nav-item dropdown">
		        	<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">MORE
		        </a>
		        <div class="dropdown-menu lgblue noborder" aria-labelledby="navbarDropdown">
		        	<a class="dropdown-item" href="#">About us</a>
		        	<a class="dropdown-item" href="#">Contact us</a>
		        </div>
		    	</li>
		    </ul>
		    <div class="navbar-nav ml-auto">
			    <a class="nav-item nav-link" href="logout.php"><i class="fas fa-sign-out-alt"></i>LOGOUT</a>
			</div>
		</div>
	</nav>
</body>
</html>