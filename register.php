<?php
	session_start();
	include "nav.php";
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
<!DOCTYPE html>
<html>
<head>
	<title>Register to Indieuber</title>
</head>
<body background ="white.jpg">
	<div class="container regdiv" style="background-color:rgba(255, 255, 255, 0.5); font-size: 13px";>
		<center><h5>REGISTER</h5><br></center>
		<form name="registration_form" method="post" action="register_sql.php" onsubmit="return validateForm()">
			<div class="form-group">
    			<label for="Name1">Name</label>
    			<input type="text" class="form-control" id="Name1" name="Name1" placeholder="Enter your name:">
			</div>
			<div class="form-group">
    			<label for="Mobile1">Mobile No</label>
    			<input type="text" class="form-control" pattern="[7-9]{1}[0-9]{9}" id="Mobile1" name="Mobile1" aria-describedby="emailHelp" placeholder="Enter mobile no:">
			</div>
			<div class="form-group">
			    <label for="Email1">Email address</label>
			    <input type="email" class="form-control" id="Email1" name="Email1" aria-describedby="emailHelp" placeholder="Enter email" required>
			    <small id="emailHelp" class="form-text text-muted">Password will be sent to this email if you forgot your password.</small>
			</div>
			<div class="form-group">
    			<label for="Password1">Password</label>
			    <input type="password" class="form-control" id="Password1" name="Password1" placeholder="Enter a password:">
			    <small id="emailHelp" class="form-text text-muted">We'll never share your details with anyone else.</small><br>
 			</div>
			<button type="submit" class="btn btn-primary">Sign Up</button><br><br>
			Already have a Account?<a href="index.php">Login</a>
		</form>
	</div>
</body>
<script>
	function validateForm() {
	    var name = document.forms["registration_form"]["Name1"].value;
	    name = name.trim();
	    if (name == "") {
	        alert("Name must be filled out");
	        return false;
	    }

	    // var mobile = document.forms['registration_form']['Mobile1'].value;
	    // var a = parseInt(mobile,10);
	    // if(Number(mobile) < 10 && Number(mobile) > 11){
	    //     alert("EMAIL must be of 8 characters.");
	    //     return false;
	    // }

	     var password = document.forms['registration_form']['Password1'].value;
	    password = password.trim();
	    if(password.length < 8){
	        alert("Password must be of 8 characters.");
	        return false;
	    }

	}
</script>
</html>