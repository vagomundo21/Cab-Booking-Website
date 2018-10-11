<?php
	session_start();
	include "nav.php";
	if(isset($_SESSION['name']))
	{
	    echo "<script> alert('USER ALREADY LOGGED IN');
            window.location.href = 'dashboard/index.php';
        </script>";
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login to Ride!</title>
</head>
<body background ="white.jpg">
	<div class="container regdiv" style="background-color:rgba(255, 255, 255, 0.5); font-size: 13px";>
		<h6 style="font-family: Catamaran";>LOGIN TO RIDE :</h6>	
		<form name="login_form" method="post" action="authen.php">
			<div class="form-group widthoffield">
				   <label for="Mobile">Mobile No.</label>
				   <input type="text" class="form-control" pattern="[1-9]{1}[0-9]{9}" id="Mobile" name="Mobile" aria-describedby="emailHelp" placeholder="Enter mobile no">
			</div>
			<div class="form-group widthoffield">
				   <label for="Password">Password</label>
				   <input type="password" class="form-control" id="Password" name="Password" placeholder="Enter the password">
				   <small id="emailHelp" class="form-text text-muted">We'll never share your details with anyone else.</small><br>
						
				<button type="submit" class="btn btn-primary">Submit</button><br><br>
				New to Indieuber?<a href="register.php">Sign up now>></a>
			</div>
		</form>
	</div>
</body>
</html>