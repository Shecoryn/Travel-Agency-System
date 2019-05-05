<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Card Infomation</title>
	<link rel="stylesheet" type="text/css" href="card_css.css">
</head>
<body>
<?php
	require('db.php');
	session_start();
	
 $data=$_SESSION["data"]=$_POST['Date'];
 $number=$_SESSION["Number"]=$_POST['Number'];
 
 	$query = "SELECT * FROM `PARKING` WHERE data='$data' AND number='$number'";
	$result = mysqli_query($con,$query);
	$rows = mysqli_num_rows($result);
	
	if($rows==1){
			header("Location: parking.php");
		}
	if($number<0 || $number>18){
		header("Location: parking.php");
	}
?>

<div class="center">
<form action="second_card_info.php" method="POST" name="login">
  <fieldset>
    <legend>Card Information</legend>
	  	
      <label>
		Name on Card
		<input type="text" name="card_name" size="20" placeholder="Donald Trump" required>
	  </label>

      <label>
		CVS
		<input type="text" name="card_CVS" maxlength="3" size="4" placeholder="•••" onkeypress="return isNumber(event)" required>
	  </label>
	  <span class="CVS">?</span>
	  <br>
	
      <label>
		Card Number
		<input type="text" name="card_number" maxlength="16" size="20" placeholder="•••• •••• •••• ••••" onkeypress="return isNumber(event)" onkeyup="validatecardnumber(this.value)" required>
	  </label>
      <span id="company" class="Tshadow"></span>

            <br>
	 <fieldset>
     <legend>Expiration</legend>
		<input type="text" name="month" maxlength="2" size="2" onkeypress="return isNumber(event)" placeholder="--">/<input type="text" maxlength="2" name="year" size="2" onkeypress="return isNumber(event)" placeholder="--" required>
	 </fieldset>
     	 <fieldset>
     <legend>Card Logo</legend>
		<div class="cardsize"><img id="myImg" src="" ></div>
	 </fieldset>
	 
	 <label>
		Promo Code
		<input type="text" name="promocode" size="20" maxlength="10" placeholder="none">
	 </label>
  </fieldset>
    <input name="submit" type="submit" value="submit">
</form>
</div>

<script>
function validatecardnumber(cardnumber) {
	var card_number=cardnumber;
	var array_card_number=card_number.split('');
	
	if(array_card_number[0]==4){
		document.getElementById('company').innerHTML = 'VISA';
		document.getElementById("myImg").src = "visa.png";
	}
	else if(array_card_number[0]==3 && (array_card_number[1]==4 || array_card_number[1]==7)){
		document.getElementById('company').innerHTML = 'AMERICAN EXPRESS';
        document.getElementById("myImg").src = "americanexpress.png";
	}
	else if(array_card_number[0]==5 && (array_card_number[1]>=1 && array_card_number[1]<=5)){
		document.getElementById('company').innerHTML = 'MASTER CARD';
		document.getElementById("myImg").src = "mastercard.png";
	}
    else{
    	document.getElementById('company').innerHTML = 'INVALID NUMBER';
		document.getElementById("myImg").src = "";
    }
}
    function isNumber(evt) {
        var iKeyCode = (evt.which) ? evt.which : evt.keyCode
        if (iKeyCode != 46 && iKeyCode > 31 && (iKeyCode < 48 || iKeyCode > 57))
            return false;

        return true;
    } 
</script>

</body>
</html>