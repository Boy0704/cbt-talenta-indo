<!DOCTYPE html>

<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Countdown JS Example</title>
	<meta name="author" content="Leonard Teo">

	<!-- Include JQuery for this example -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>

	<!-- Include the countdown script -->
	<script src="countdown.js"></script>
	
	<!-- Do the actual countdown -->
	<script>
	// jQuery on document ready
	$(document).ready(function(){
		
		//You must always have the target date and the current date
		//The current date is the date of your server so that you don't run into timezone issues
		//Use your server side programming (PHP/Ruby/Python/ASP, etc) to output a date that you can read in using Javascript
		<?php 
		date_default_timezone_set('Asia/Jakarta');
		$target = date('Y').', '.date('m').', '.date('d').', '.date('H').', '.date('i').', '.date('s'); 

		 ?>

		var target_date = new Date(2020, 3, 30, 15, 2, 0);
	    var current_date = new Date(<?php echo $target ?>);

		//Create the countdown object
		var count = new Countdown(target_date, current_date);

		//Run the countdown
		count.countdown(function(obj) {
			//Do anything you want with the obj, which contains days, hours, minutes, seconds
			//This will be called every one second as the countdown timer goes
			// console.debug(obj);

			//E.g. you might use jQuery to update the countdown
			console.log(obj.seconds);
			$('#days').html(obj.days);
			$('#hours').html(obj.hours);
			$('#minutes').html(obj.minutes);
			$('#seconds').html(obj.seconds);
			
			//This version will display all numbers with two digits
			//$('#days').html((obj.days < 10 ? '0' : '') + obj.days);
        		//$('#hours').html((obj.hours < 10 ? '0' : '') + obj.hours);
        		//$('#minutes').html((obj.minutes < 10 ? '0' : '') + obj.minutes);
        		//$('#seconds').html((obj.seconds < 10 ? '0' : '') + obj.seconds);
		});
		
	});
	</script>
	
	<!--
		Arbitrary styles for the countdown. Use your own
	-->
	<style>
	body {
		font-family: arial, sans-serif;
	}
	.container {
		width: 400px;
		margin: 0px auto;
		padding: 100px;
	}
	.countdown .digits td {
		font-size: 40px;
		text-align: center;
		padding: 5px;
	}
	.countdown tbody td {
		text-align: center;
		padding: 5px;
	}
	
	</style>
	

</head>
<body>
	
	<div class="container">
		<!--
			Countdown Table
		-->
		<table class="countdown">
			<thead class="digits">
				<tr>
					<td id="days"></td>
					<td id="hours"></td>
					<td id="minutes"></td>
					<td id="seconds"></td>												
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Days</td>
					<td>Hours</td>
					<td>Minutes</td>
					<td>Seconds</td>								
				</tr>
			</tbody>
		</table>
	</div>

</body>
</html>
