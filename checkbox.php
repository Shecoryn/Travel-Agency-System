<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>check out</title>
	<link rel="stylesheet" type="text/css" href="cart.css">
</head>
<body>
<div class="centerText">
<?php
	require('db.php');
	session_start();
		$user_id=$_SESSION["id"];
		$query = "SELECT * FROM USER_TRAVEL WHERE user_id='$user_id'";
		$result = mysqli_query($con,$query);
		$num=mysqli_fetch_array($result);
		$email=$num["email"];
?>
<h1 class="custHead">order is successful</h1>
<h3 class="custHead">current id is <?php echo $_SESSION["username"]; ?><br>Agency will contect you throgh the email, <?php echo $email; ?></h3>
<a href="parking.php">pay-parking</a>
<h3 class="custHead">history of order</h3>
<?php
	$query = "SELECT * FROM `ORDER_HISTORY` WHERE user_id='$user_id'";
	$result = mysqli_query($con,$query);
?>
<table id="orgTab">
	<tr>
		<th>from</th>
		<th>to</th>
		<th>vehicle</th>
		<th>people</th>
		<th>period</th>
		<th>when</th>
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
</div>
</body>
</html>