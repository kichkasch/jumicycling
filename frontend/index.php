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

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>JuMiCycling</title>
<meta name="Description" content="Repository for Cycling statistics" />
<meta name="Keywords" content="cycling workout statistics repository" />
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<link rel="stylesheet" type="text/css" href="style.css" media="screen" />
</head>

<?php
include 'config.php';

$action=$_REQUEST['action'];

if (isset ($action)) {
	if (! empty ($action)) {
		$datetime = $_REQUEST['datetime'];
		$comment = $_REQUEST['comment'];
		$maxspeed = $_REQUEST['maxspeed'];
		$averagespeed = $_REQUEST['averagespeed'];
		$duration = $_REQUEST['duration'];
		$distance = $_REQUEST['distance'];
		addWorkout();
	}
}

?>

<body>
<div id="wrap">
  <div id="header">
    <h1>JuMiCycling</h1>
    <h2>Repository for Cycling statistics</h2>
  </div>
  <div id="menu"> <!--<a href="#">Home</a> <a href="#">About </a> <a href="#">Contact</a>--></div>
  
  <div id="content">
    <h2>Add workout</h2>
    <p><table width="100%"><tr>
		<td width="5%">&nbsp;</td>
		<td width="90%">

<form action="index.php">
<table width='100%' border='0' bgcolor="#DDDDDD" cellspacing="5">
<tr>
<td width="50%">Date and time<br/><input name="datetime" type="text" size="30" value=' <?php print (date("Y-m-d H:i:s")); ?> ' /></td>
<td>Distance<br/><input name="distance" type="text" size="30" maxlength="50"/> km/h</td>
</tr>
<tr>
<td>Comment<br/><input name="comment" type="text" size="50" maxlength="200" /></td>
<td>Duration<br/><input name="duration" type="text" size="30" maxlength="50" /> (hh:mm:ss) </td>
</tr>
<tr>
<td>Max Speed<br/><input name="maxspeed" type="test" size="30"/> km/h </td>
<td>Average Speed<br/><input name="averagespeed" type="test" size="30"/> km/h </td>
</tr>
</table>
<input type="hidden" name="action" value="addWorkout">
<div align="right"><input type="submit" value="Save this workout"></div>
</form>


		</td>
		<td width="5%">&nbsp;</td>
		</tr></table></p>
    <p>&nbsp;</p>

    <p>&nbsp;</p>
    
    <h2>Past workouts</h2>
    <p><table width="100%"><tr>
		<td width="5%">&nbsp;</td>
		<td width="90%">

<table cellpadding="0" cellspacing="0" border="1" width="100%">
<tr align="center"><th>Date</th><th>Comment</th><th>Distance</th><th>Duration</th><th>Max Speed</th><th>Average Speed</th></tr>


<?php
$linkID = mysql_connect($host, $user, $pass) or die("Could not connect to host.");
mysql_select_db($database, $linkID) or die("Could not find database.");
$query = "SELECT DATETIME, COMMENT, DISTANCE, DURATION, MAXSPEED, AVERAGESPEED from cyclingstats ORDER BY DATETIME DESC";
$resultID = mysql_query($query, $linkID) or die("Data not found.");
for($x = 0 ; $x < mysql_num_rows($resultID) ; $x++){
 $row = mysql_fetch_assoc($resultID);
 print("<tr align='left'>");
 print("<td>" . $row['DATETIME'] . "</td>");
 print('<td>' . $row['COMMENT'] . '</td>');
 print('<td>' . $row['DISTANCE'] . '</td>');
 print('<td>' . $row['DURATION'] . '</td>');
 print('<td>' . $row['MAXSPEED'] . '</td>');
 print('<td>' . $row['AVERAGESPEED'] . '</td>');
 print('</tr>');
}
?>

</table>		
		
		</td>
		<td width="5%">&nbsp;</td>
		</tr></table></p>
    <p>&nbsp;</p>

  </div>
  <div id="footer">Content by <a href="mailto:kichkasch@gmx.de">Michael Pilgermann</a> | Open Source Design Template sponsored by <a href="http://www.cmgtechnologies.com/">CMG Technologies</a><a href="#"></a>. </div>
</div>
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



/*  END functions  */

?>