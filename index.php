<?php
session_start();
include "nav.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Welcome to Indieuber</title>
<?php
	if(isset($_SESSION['name']))
	{
	    echo "<script> alert('USER ALREADY LOGGED IN');
            window.location.href = 'dashboard/index.php';
        </script>";
	}
	elseif (isset($_SESSION['d_id'])) {
		echo "<script> alert('DRIVER ALREADY LOGGED IN');
            window.location.href = 'driverboard/index.php';
        </script>";
	}
?>
</head>
<body class="mainbody" background="white.jpg";>
	<div class="container-fluid cimg">
		<div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
			<div class="carousel-inner">
			    <div class="carousel-item active">
			    	<img class="d-block w-100 " src="cimages/premium.jpg" style="max-height: 75%;">
			    	<div class="carousel-caption">
					    <h5>ONLY PREMIUM CARS</h5>
					    <p>Our cabs are of premium quality, from Sedans and SUVs to Luxury cars.</p>
					</div>
			    </div>
			    <div class="carousel-item">
			    	<img class="d-block w-100 " src="cimages/cheap.jpg" style="max-height: 75%;">
			    	<div class="carousel-caption">
					    <h5>CABS FOR EVERY POCKET</h5>
					    <p>Premium cars? But our cabs suits everyones pocket.We let you ride a Prime Sedan at Mini fares, book cabs without peak pricing and has zero wait time</p>
					</div>
			    </div>
			    <div class="carousel-item">
			    	<img class="d-block w-100 " src="cimages/anywhere.jpeg" style="max-height: 75%;">
			    	<div class="carousel-caption">
					    <h5>EASY TO BOOK</h5>
					    <p>Book a cab with us from any device and from anywhere.</p>
					</div>
			    </div>
		  </div>
		  <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
		    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
		    <span class="sr-only">Previous</span>
		  </a>
		  <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
		    <span class="carousel-control-next-icon" aria-hidden="true"></span>
		    <span class="sr-only">Next</span>
		  </a>
		</div>
	</div>
</body>
</html>
<!-- API for place auto complete- https://www.w3docs.com/learn-javascript/places-autocomplete.html
		https://www.aspsnippets.com/Articles/Google-Maps-V3-API-Calculate-distance-between-two-addresses-points-locations.aspx-->