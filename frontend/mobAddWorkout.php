<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
        <title>JuMi Cycling Mobile</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://code.jquery.com/mobile/1.1.0/jquery.mobile-1.1.0.min.css" />
        <script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
        <script src="http://code.jquery.com/mobile/1.1.0/jquery.mobile-1.1.0.min.js"></script>
</head>

<?php
include 'config.php';
include 'tools.php';
?>

<body>

<div data-role="dialog">
	
		<div data-role="header" data-theme="d">
			<h1>Insert new Workout</h1>

		</div>

		<div data-role="content" data-theme="c">

		<form action="mobile.php" method="post" data-ajax="false" class="ui-body ui-body-a ui-corner-all">
		<fieldset>
				<label for="waDate">Date of workout (YYYY-MM-DD):</label>
    			<input type="text" name="waDate" id="waDate" value=' <?php print (date("Y-m-d")); ?> '  />
				<label for="waDistance">Distance (km):</label>
    			<input type="text" name="waDistance" id="waDistance" value=""  />
				<label for="waComment">Comment:</label>
    			<input type="text" name="waComment" id="waComment" value=""  />
				<label for="waDuration">Duration (hh:mm:ss):</label>
    			<input type="text" name="waDuration" id="waDuration" value=""  />
				<label for="waAvgSpeed">Average Speed (km/h):</label>
    			<input type="text" name="waAvgSpeed" id="waAvgSpeed" value=""  />
				<label for="waMaxSpeed">Max Speed (km/h):</label>
    			<input type="text" name="waMaxSpeed" id="waMaxSpeed" value=""  />
				<input type="hidden" name="action" value="addWorkout"/>
			<button type="submit" data-theme="b" name="submit" value="submit-value">Save Workout</button>
		</fieldset>
		</form>
			       
			<a href="mobile.php" data-role="button" data-rel="back" data-theme="e">Cancel</a>    
		</div>
</div>


</body>
</html>