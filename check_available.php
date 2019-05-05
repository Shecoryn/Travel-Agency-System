<?php
	require('db.php');
	session_start();
	
	$data=$_GET["data"];
	$data=mysqli_real_escape_string($con,$data);
	
	$query = "SELECT * FROM `PARKING` WHERE data='$data'";
	$result = mysqli_query($con,$query);
	
	echo "<tr>";
	echo "<th>Number</th><th>Available</th>";
	echo "</tr>";
	while($num=mysqli_fetch_array($result)){
			echo "<tr>";
			echo "<td>".$num["number"]."</td>";
			echo "<td>".$num["available"]."</td>";
			echo "</tr>";
	}
?>
