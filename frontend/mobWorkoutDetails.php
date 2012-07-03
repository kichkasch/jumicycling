<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
        <title>JuMiCycling Mobile</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://code.jquery.com/mobile/1.1.0/jquery.mobile-1.1.0.min.css" />
        <script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
        <script src="http://code.jquery.com/mobile/1.1.0/jquery.mobile-1.1.0.min.js"></script>
</head>

<?php
include 'config.php';
include 'tools.php';

$waComment = hex2bin($_REQUEST['waComment']);
$waDate = $_REQUEST['waDate'];
$waDistance = $_REQUEST['waDistance'];
$waDuration = $_REQUEST['waDuration'];
$waMaxSpeed = $_REQUEST['waMaxSpeed'];
$waAvgSpeed = $_REQUEST['waAvgSpeed'];
?>

<body>
<div data-role="dialog">
		<div data-role="header" data-theme="d">
			<h1>Details for Workout</h1>
		</div>

		<div data-role="content" data-theme="c">

		<ul data-role="listview" data-inset="true">
			<li>
				<h3>Comment for workout</h3>
				<p><?php print($waComment); ?></p>
				<p class="ui-li-aside"><strong><?php print($waDate); ?></strong></p>
			</li>
			<li>
				<h3>Distance</h3>
				<p><?php print($waDistance); ?> km</p>
			</li>
			<li>
				<h3>Statistics</h3>
				<p>
				<table width="100%" >
				<tr> <th>Duration</th> <td><?php print($waDuration); ?></td></tr>
				<tr><th>Average speed</th><td><?php print($waAvgSpeed); ?> km/h</td></tr>
				<tr><th>Max speed</th><td><?php print($waMaxSpeed); ?> km/h</td></tr>
				</table>
				</p>
			</li>
		</ul>
			       
			<a href="#" data-role="button" data-rel="back" data-theme="e">Close</a>    
		</div>
</div>

</body>
</html>