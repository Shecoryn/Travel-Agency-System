<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="cart.css">
	<title>Welcome Home</title>
</head>
<body>
<div class="centerText">
<h1 class="custHead">Your Cart</h1>
<?php
	require('db.php');
	session_start();
	$user_id=$_SESSION["id"];

	$query = "SELECT * FROM `TRAVEL_INFO` WHERE user_id='$user_id'";
	$result = mysqli_query($con,$query);
?>
<table id="orgTab">
	<tr>
		<th>From</th>
		<th>To</th>
		<th>Vehicle</th>
		<th>Number of People</th>
		<th>Period</th>
		<th>When</th>
	</tr>
<?php
	while($num=mysqli_fetch_array($result)){
			echo "<tr>";
			echo "<td>".$num["from_to"]."</td>";
			echo "<td>".$num["to_from"]."</td>";
			echo "<td>".$num["vehicle"]."</td>";
			echo "<td>".$num["people"]."</td>";
			echo "<td>".$num["period"]."</td>";
			echo "<td>".$num["departure"]."</td>";
			echo "</tr>";
	}
?>
</table>
<?php	
	if(isset($_POST['submit'])){
		$query = "SELECT * FROM `TRAVEL_INFO` WHERE user_id='$user_id'";
		$result = mysqli_query($con,$query);
		while($num=mysqli_fetch_array($result)){
			$from=$num["from_to"];
			$to=$num["to_from"];
			$vehicle=$num["vehicle"];
			$people=$num["people"];
			$period=$num["period"];
			$when=$num["departure"];
			$query = "INSERT INTO ORDER_HISTORY (from_to,to_from,vehicle,people,period,departure,user_id) VALUE('$from','$to','$vehicle','$people','$period','$when','$user_id')";
			$result = mysqli_query($con,$query);
		}
		$query = "DELETE FROM TRAVEL_INFO WHERE user_id='$user_id'";
		$result = mysqli_query($con,$query);
		header("Location: checkbox.php");
	}
?>
<form action="cart.php" method="POST" name="login">
			<input name="submit" type="submit" value="View Order(s)" class="buttonCustom">

</form>
<a href="Information.php">Back to trip input</a>
</div>
</body>
</html>