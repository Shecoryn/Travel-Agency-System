<?php
$name="jpark118";
$root="localhost";
$con = mysqli_connect($root,$name,$name,$name);
if (!$con)
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>