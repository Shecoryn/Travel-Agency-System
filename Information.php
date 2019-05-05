<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>info</title>
	<link rel="stylesheet" type="text/css" href="cart.css">
</head>
<body>
<?php
	require('db.php');
	session_start();
	$user_id=$_SESSION["id"];
	
	if(isset($_POST['from'])){
		$from = stripslashes($_POST['from']);
		$from = mysqli_real_escape_string($con,$from);
		
		$to = stripslashes($_POST['to']);
		$to = mysqli_real_escape_string($con,$to);
		
		$vehicle = stripslashes($_POST['vehicle']);
		$vehicle = mysqli_real_escape_string($con,$vehicle);
		
		$people = stripslashes($_POST['people']);
		$people = mysqli_real_escape_string($con,$people);
								
		$period = stripslashes($_POST['period']);
		$period = mysqli_real_escape_string($con,$period);
				
		$when = stripslashes($_POST['when']);
		$when = mysqli_real_escape_string($con,$when);
		
		$query = "INSERT INTO TRAVEL_INFO (from_to,to_from,vehicle,people,period,departure,user_id) VALUE('$from','$to','$vehicle','$people','$period','$when','$user_id')";
		$result = mysqli_query($con,$query);
		header("Location: cart.php");
	}
?>
<div class="centerText">
<h2 class="custHead">Hello <?php echo $_SESSION["username"];?></h2>
<h1 class="custHead">What would you like to do?</h1>
</div>
<div class="centerText">
<form action="Information.php" method="POST" name="login">
		<label>From</label>
			<div>
			<input type="text" name="from" required >
			</div>
			<label>To</label>
			<div>
			<input type="text" name="to" required >
			</div>
			<label>How many people</label>
			<div>
			<input type="text" name="people" required >
			</div>
			<label>vehicle</label>
			<div>
			<input type="text" name="vehicle" required >
			</div>
			<label>when</label>
			<div>
			<input type="text" name="when" required >
			</div>
			<label>period</label>
			<div>
			<input type="text" name="period" required >
			</div>
			<input name="submit" type="submit" value="submit" class="buttonCustom">
</form>
</div>
</body>
</html>