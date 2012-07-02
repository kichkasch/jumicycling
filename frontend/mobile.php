<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php
/* !--
JuMiCycling - Cycling Stats repository
by Michael Pilgermann (kichkasch@gmx.de)
Copyright (C) 2010 Michael Pilgermann
 
This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.
 
This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
 
You should have received a copy of the GNU General Public License
along with this program. If not, see <http://www.gnu.org/licenses/>.
*/
?>
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

$action=$_REQUEST['action'];
if (isset ($action)) {
	if (! empty ($action)) {
		if (! strcmp($action, "addWorkout")) {
			$datetime = $_REQUEST['waDate'];
			$comment = $_REQUEST['waComment'];
			$maxspeed = $_REQUEST['waMaxSpeed'];
			$averagespeed = $_REQUEST['waAvgSpeed'];
			$duration = $_REQUEST['waDuration'];
			$distance = $_REQUEST['waDistance'];
			addWorkout();
		}
	}
}

?>

<body>

<div data-role="page">
        <div data-role="header">
                <h1>JuMiCycling Mobile</h1>
        </div><!-- /header -->
        <div data-role="content">

<a href="mobAddWorkout.php" data-role="button" data-theme="b" data-icon="star" data-rel="dialog">Add Workout</a>

<ul data-role="listview" data-inset="true" data-filter="false">
<?php
$linkID = mysql_connect($host, $user, $pass) or die("Could not connect to host.");
mysql_select_db($database, $linkID) or die("Could not find database.");
$query = "SELECT CAST(`DATETIME` AS DATE) AS DATEONLY, YEAR(DATETIME) AS YEAR, MONTH(DATETIME) AS MONTH, COMMENT, DISTANCE, DURATION, MAXSPEED, AVERAGESPEED from cyclingstats ORDER BY DATETIME DESC LIMIT 0, " . $mobWorkoutCount . " ";
$resultID = mysql_query($query, $linkID) or die("Data not found.");
$lastMonth = -1;
for($x = 0 ; $x < mysql_num_rows($resultID) ; $x++){
 $row = mysql_fetch_assoc($resultID);
 $thisMonth = intval($row['MONTH']);
 if ($thisMonth != $lastMonth) { 
  print('<li data-theme="e" style="text-align:center">' . $months[$thisMonth] . ' ' . $row['YEAR'] . '</li>');
  $lastMonth = $thisMonth;
 }
 print('<li><a href="mobWorkoutDetails.php?waComment=' . bin2hex($row['COMMENT']) . '&waDate=' . $row['DATEONLY'] . '&waDistance=' . $row['DISTANCE'] . '&waDuration=' . $row['DURATION'] . '&waMaxSpeed=' . $row['MAXSPEED'] . '&waAvgSpeed=' . $row['AVERAGESPEED'] . '">' . $row['DISTANCE'] . ' km on ' . $row['DATEONLY'] . '</a></li>');
 }
?>
</ul>

<a href="#" data-role="button" data-theme="a" data-icon="star">More ...</a>


</div><!-- /content -->

</div><!-- /page -->

</body>
</html>


<?php
/*

FUNCTIONS 

*/

function addWorkout() {
		global $datetime;
		global $comment;
		global $maxspeed;
		global $averagespeed;
		global $duration;
		global $distance;
		
		global $host;
		global $user;
		global $pass;
		global $database;

$linkID = mysql_connect($host, $user, $pass) or die("Could not connect to host.");
mysql_select_db($database, $linkID) or die("Could not find database.");

$query = "insert into cyclingstats (DATETIME, COMMENT, DISTANCE, DURATION, MAXSPEED, AVERAGESPEED ) values ('" . $datetime . "','" . $comment . "'," . $distance . ",'" . $duration . "'," . $maxspeed . "," . $averagespeed . ")";
$resultID = mysql_query($query, $linkID) or die("Could not insert value (Workout).");
mysql_close($linkID);
}
?>