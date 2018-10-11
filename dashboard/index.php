<?php
	include 'navbar.php';
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="icon" type="image/gif/png" href="icon0.png">
	<title>Indieuber-Homepage</title>
</head>
<body>
	<div class="container-fluid" style="padding-top: 80px";>
		<div class="jumbotron">
			<h1 class="display-4">Welcome, <?php echo $_SESSION['name']; ?></h1>
		</div>

		<?php
			$user = $_SESSION['mobile'];
			$arrive = 420;
			date_default_timezone_set("Asia/Kolkata");
			$timestamp1 = date("Y-m-d H:i:s");
			$timestamp = strtotime($timestamp1);
			$current_ride = "SELECT * FROM `rides` WHERE `mobile` = '".$user."' AND ('".$timestamp."' - `unixtime`) < '".$arrive."'";
			$ride_data = mysqli_query($connect, $current_ride);
			if(mysqli_num_rows($ride_data) != "")
			{
				echo "
					<form name='cancel_form' method='post' action='cancel.php'>
						<div class='form-group'>
							<label for='ride_id'>Enter the ride ID of following rides to cancel ride:</label>
							<input type='text' class='form-control' pattern='\d+' name='ride_id' aria-describedby='emailHelp' placeholder='Enter Ride no' style='width:30%';  required><br>
							<button type='submit' class='btn btn-primary'>Cancel</button><br><br>
						</div>
					</form>
				";
				echo "
				<center>
				<div class='table-responsive' style='width: 100% padding-top:150 px'>
					<table class='table table-bordered'>
					<tr>
					<th width='5%'>Ride No</th>
					<th width='18%'>Source</th>
					<th width='18%'>Destination</th>
					<th width='10%'>Booked D&T</th>
					<th width='5%'>Fare</th>
					<th width='13%'>Driver Name</th>
					<th width='11%'>Driver Contact No</th>
					<th width='11%'>Driver Car No</th>
					<th width='10%'>Status</th>
					</tr>
				";
				while($row_posts = mysqli_fetch_array($ride_data))
				{			
					if($row_posts['status']=="0"){
						$status = "On-going";
					}	
					elseif($row_posts['status']=="1"){
						$status = "Canceled by user";
					}
					else{
						$status = "Canceled by driver";

					}			
					echo '<tr>';
						echo "<td>";
							echo $row_posts['ride_no'];
						echo "</td>";
						echo "<td><center>";
							echo $row_posts['source'];
						echo "</center></td>";
						echo "<td>";
							echo $row_posts['destin'];
						echo "</td>";
						echo "<td>";
							echo '<div id="timestamp">';
								echo $row_posts['timestamp1'];
							echo '</div>';
						echo "</td>";
						echo "<td>";
							echo $row_posts['fare'];
						echo "</td>";
						echo "<td>";
							echo $row_posts['drivername'];
						echo "</td>";
						echo "<td>";
							echo $row_posts['driverno'];
						echo "</td>";
						echo "<td>";
							echo $row_posts['carno'];
						echo "</td>";
						echo "<td>";
							echo $status;
						echo "</td>";
					echo '</tr>';
				}
				echo " 
					</table>
					</div>
					</center>
				";
			}
			else
			{
				echo "
					<div class='card'>
						<h5 class='card-header'>Hello There!</h5>
						<div class='card-body'>
							<h5 class='card-title'>No on-going rides found.</h5>
							<p class='card-text'>You can book a cab right now! Click below link.</p>
							<a href='bookcab.php' class='btn btn-primary'>Book a Cab</a>
						</div>
					</div>
				";
			}
		?>
	</div>
</body>
</html>