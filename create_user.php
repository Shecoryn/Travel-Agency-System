<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="create_user.css">
	<title>create</title>
</head>
<body>
<?php
	require('db.php');
	session_start();
	
	if(isset($_POST['name'])){
		$name = stripslashes($_POST['name']);
		$name = mysqli_real_escape_string($con,$name);
		$passward = stripslashes($_POST['passward']);
		$passward = mysqli_real_escape_string($con,$passward);
		$email = stripslashes($_POST['email']);
		$email = mysqli_real_escape_string($con,$email);
		$query = "SELECT * FROM `USER_TRAVEL` WHERE user_name='$name' OR email='$email'";
		$result = mysqli_query($con,$query);
		$row=mysqli_fetch_array($result);
		$rows = mysqli_num_rows($result);
	
		if($rows==0){
			$query = "INSERT INTO USER_TRAVEL (user_name,passward,email) VALUE('$name','$passward','$email')";
			$result = mysqli_query($con,$query);
			header("Location: log_in.php");
		}
		else{
			echo "<div><h3>Username/e-amil is already registered</h3></div>";
		}
	}
?>
<div class="centerText">
<div class="newUserMenu">
<h1>Register</h1>
<form action="create_user.php"  method="POST" name="insertvalue">
		<label>User ID</label>
			<div>
			<input type="text" name="name" required >
			</div><br>
		<label>Password</label>
			<div>
			<input type="text" name="passward" required >
			</div><br>
		<label>E-mail</label>
			<div>
			<input type="text" name="email" required >
			</div><br>
			<input name="insert" type="submit" value="Register" class="buttonCustom">
</form>
</div>
</div>
</body>
</html>