<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Personal Information</title>
	<link rel="stylesheet" type="text/css" href="card_css.css">
</head>
<body>
<?php
	require('db.php');
	session_start();
	
 $data=$_SESSION["data"];
 $number=$_SESSION["Number"];
 $available = "NO";
 
		$data = mysqli_real_escape_string($con,$data);
		$number = mysqli_real_escape_string($con,$number);
		$available = mysqli_real_escape_string($con,$available);
		
		$query = "INSERT INTO PARKING (data,number,available) VALUE('$data','$number','$available')";
		$result = mysqli_query($con,$query);
?>
<div class="center">
<h1 class="Tshadow">your order is sucessful</h1>
<a href="welcome.php"><h3>Click to Welcome</h3></a>
</div>
</body>
</html>