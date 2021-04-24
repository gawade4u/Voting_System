<?php
$servername = "localhost";
$username = "rishikesh";
$password = " ";
$dbname = "CollegeVoting";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn)
{
	die("Connection failed: " . mysqli_connect_error());
}
?>
