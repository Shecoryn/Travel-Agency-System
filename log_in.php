<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="log_in.css">
	<title>Log In</title>
</head>
<body>
<?php
	require('db.php');
	session_start();
	
	if(isset($_POST['username'])){
		$username = stripslashes($_POST['username']);
		$username = mysqli_real_escape_string($con,$username);
		$password = stripslashes($_POST['password']);
		$password = mysqli_real_escape_string($con,$password);
		$query = "SELECT * FROM `USER_TRAVEL` WHERE user_name='$username' AND passward='$password'";
		$result = mysqli_query($con,$query);
		$row=mysqli_fetch_array($result);
		$rows = mysqli_num_rows($result);
	
		if($rows==1){
			$_SESSION["username"] = $username;
			$_SESSION["id"] =$row[0];
			header("Location: Information.php");
		}
		else{
			echo "<div><h3>Username/password is incorrect</h3></div>";
		}
	}
?>
<div class="centerText">
<div class="loginMenu">
<h1>Login Page</h1>
<form action="log_in.php" method="POST" name="login">
		<label>User ID</label>
			<div>
			<input type="text" name="username" required >
			</div>
		<label>Password</label>
			<div>
			<input type="password" name="password" required >
			</div>
			<input name="submit" type="submit" value="Login" class="buttonCustom">
</form>
<div>If you do not have account <a href="create_user.php">CLICK HERE</a> to create one.</div>
</div>
</div>
</body>
</html>