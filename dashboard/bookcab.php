<?php
	include 'navbar.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Book your ride!</title>
</head>
<body onload="SetMap()">
	<div class="container-fluid" style="padding-top: 75px">
		<div class="row">
			<div class="col-lg-4 col-md-6 col-sm-12">	
		     		<form name="booking" method="post" action="book.php">
						<div class="form-group">
					    	<label for="txtSource">Source Address:</label>
					    	<input type="text" class="form-control" name="txtSource" id="txtSource" placeholder="Source">

					    	<label for="txtDestination">Destination Address:</label>
					    	<input type="text" class="form-control" name="txtDestination" id="txtDestination" placeholder="Destination"><br>

					    	<input type="button" class="btn btn-outline-success" id="cfare" value="Calculate Fare" onclick="GetRoute()" />
					    	<br><br>
					    	<label for="distance1">Distance:</label>
					    	<input type="text" class="form-control" name="distance1" id="distance1" readonly>
					    	<label for="time1">Estimated Time:</label>
					    	<input type="text" class="form-control" name="time1" id="time1" readonly>
					    	<input type="hidden" id="timeinsec" name="timeinsec"> <!-- for time in seconds-->
					    	<label for="fare1">Estimated Fare:</label>
					    	<input type="text" class="form-control" name="fare1" id="fare1" readonly><br>
					    	<input type="submit" class="btn btn-primary" id="book" value="CONFIRM" disabled="true">
						</div>
					</form>
		    </div>

			<div class="col-lg-8 col-md-12 col-sm-12" id="dvMap" style="height:500px">
			</div>

		</div>
	</div>

	<div id="dvDistance">
	</div>
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=your_key&libraries=places"></script>
		<script type="text/javascript">
		var source, destination;
		var directionsDisplay;
		var directionsService = new google.maps.DirectionsService();
		google.maps.event.addDomListener(window, 'load', function () {	
			var southWest = new google.maps.LatLng( 18.75318532, 73.39672319 );
    		var northEast = new google.maps.LatLng( 19.3033145, 72.78993529 );	
			var MumbaiBounds = new google.maps.LatLngBounds( southWest, northEast );  
		    var input = document.getElementById('txtSource');
    		var options = {
    			bounds: MumbaiBounds,
        		// types: ['(cities)'],
        		componentRestrictions: {country: 'in'},
        		strictBounds: true,
    		};
    		var searchBox = new google.maps.places.Autocomplete(input,options);

		    var input1 = document.getElementById('txtDestination');
    		var options = {
    			bounds: MumbaiBounds,
        		// types: ['(cities)'],
        		componentRestrictions: {country: 'in'},
        		strictBounds: true,
    		};
    		var searchBox1 = new google.maps.places.Autocomplete(input1,options);

		    directionsDisplay = new google.maps.DirectionsRenderer({ 'draggable': true });
		});


		 
		function SetMap() {
		    var mumbai = new google.maps.LatLng(18.9750, 72.8258);
		    var mapOptions = {
		        zoom: 7,
		        center: mumbai
		    };
		    map = new google.maps.Map(document.getElementById('dvMap'), mapOptions);
		}
		function GetRoute() {
		    var mumbai = new google.maps.LatLng(18.9750, 72.8258);
		    var mapOptions = {
		        zoom: 7,
		        center: mumbai
		    };
		    map = new google.maps.Map(document.getElementById('dvMap'), mapOptions);
		    directionsDisplay.setMap(map);

		    //To display the directions:
		    // directionsDisplay.setPanel(document.getElementById('dvPanel'));
		 
		    //*********DIRECTIONS AND ROUTE**********************//
		    source = document.getElementById("txtSource").value;
		    destination = document.getElementById("txtDestination").value;
		 
		    var request = {
		        origin: source,
		        destination: destination,
		        travelMode: google.maps.TravelMode.DRIVING
		    };
		    directionsService.route(request, function (response, status) {
		        if (status == google.maps.DirectionsStatus.OK) {
		            directionsDisplay.setDirections(response);
		        }
		    });
		 
		    //*********DISTANCE AND DURATION**********************//
		    var service = new google.maps.DistanceMatrixService();
		    service.getDistanceMatrix({
		        origins: [source],
		        destinations: [destination],
		        travelMode: google.maps.TravelMode.DRIVING,
		        unitSystem: google.maps.UnitSystem.METRIC,
		        avoidHighways: false,
		        avoidTolls: false
		    }, function (response, status) {
		        if (status == google.maps.DistanceMatrixStatus.OK && response.rows[0].elements[0].status != "ZERO_RESULTS") {
		            var distance = response.rows[0].elements[0].distance.text;
		            var fare = response.rows[0].elements[0].distance.value;
		            var duration = response.rows[0].elements[0].duration.text;
		            var times = response.rows[0].elements[0].duration.value;
		            var dvDistance = document.getElementById("dvDistance");
		            fare = 35 + (fare/1000)*12;
		            var faree = Math.ceil(fare);

		            var textbox1 = document.getElementById('distance1');
					textbox1.value=distance;
					var textbox2 = document.getElementById('time1');
					textbox2.value=duration;
					var tq = document.getElementById('timeinsec');
					tq.value=times;
					var textbox3 = document.getElementById('fare1');
					textbox3.value=faree;				

		        	var able = document.getElementById("book"); 
					able.disabled=false;
					var disable = document.getElementById("cfare"); 
					disable.disabled=true;
					var disables = document.getElementById("txtSource"); 
					disables.readOnly=true;
					var disabled = document.getElementById("txtDestination"); 
					disabled.readOnly=true;

		        } else {
		            alert("Unable to find the distance via road."); 
		        }
		    });
		}
	</script>
</body>
</html>
<!-- AIzaSyAPpezjZQ1Wyw6u_w2mz25qp8Wk88P_cFo -->
