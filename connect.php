<?php
//CODE TO CONNECT PHP WITH DATABASE.
$hostname="127.0.0.1"; 		//hostname
$username="root"; 			//username for database
$password=""; 				//database password
$dbname="cabbooking"; 		//database name
$connect=mysqli_connect($hostname,$username,$password,$dbname) or die("Error Connecting ".  mysqli_connect_error()); 		//make connection
//$connect becomes the OBJECT/VARIABLE we’ll use to fire queries to database
?>