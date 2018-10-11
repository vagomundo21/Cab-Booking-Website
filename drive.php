<?php
	session_start();
	include "nav.php";
	if(isset($_SESSION['d_id']))
	{
	    echo "<script> alert('DRIVER ALREADY LOGGED IN');
            window.location.href = 'driverboard/index.php';
        </script>";
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login to Drive!</title>
</head>
<body background ="white.jpg">
	<div class="container regdiv" style="background-color:rgba(255, 255, 255, 0.5); font-size: 13px";>
		<h6 style="font-family: Catamaran";>LOGIN TO DRIVE :</h6>	
		<form name="login_form_driver" method="post" action="authen_driver.php">
			<div class="form-group widthoffield">
				   <label for="Mobiled">Mobile No.</label>
				   <input type="text" class="form-control" pattern="[1-9]{1}[0-9]{9}" id="Mobiled" name="Mobiled" aria-describedby="emailHelp" placeholder="Enter mobile no">
			</div>
			<div class="form-group widthoffield">
				   <label for="Passwordd">Password</label>
				   <input type="password" class="form-control" id="Passwordd" name="Passwordd" placeholder="Enter the password"><br>		
				<button type="submit" class="btn btn-primary">Submit</button><br><br>
				Want to become a driver?<a href="#">Contact us now>></a>
			</div>
		</form>
	</div>
</body>
</html>