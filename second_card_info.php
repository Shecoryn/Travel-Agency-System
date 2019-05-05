<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Personal Information</title>
	<link rel="stylesheet" type="text/css" href="card_css.css">
</head>
<body>
<div class="center">
<form action="final.php" method="POST" name="login">
  <fieldset>
    <legend>Address</legend>
      <label>
		Address
		<input type="text" id="Adress" size="20" required>
	  </label>
	  <label>
		City
		<input type="text" id="City" size="10" required>
	  </label>
	  <label>
		State
		<input type="text" id="State" size="5" required>
	  </label>
	  <label>
		ZIP code
		<input type="text" id="ZIP" size="5" required>
	  </label>
  </fieldset>
  <span>if Billing address is the same with Address:<span class="clickable" onclick="fill_billing_address()">click here</span></span><br><br>
  
  <fieldset>
    <legend>Billing Address</legend>
      <label>
		Address
		<input type="text" id="BAdress" size="20" required>
	  </label>
	  <label>
		City
		<input type="text" id="BCity" size="10" required>
	  </label>
	  <label>
		State
		<input type="text" id="BState" size="5" required>
	  </label>
	  <label>
		ZIP code
		<input type="text" id="BZIP" size="5" required>
	  </label>
  </fieldset><br>
    <fieldset>
    <legend>Contect</legend>
      <label>
		Phone Number
		<input type="text" name="Phone"  maxlength="10" size="20" onkeypress="return isNumber(event)" required>
	  </label>
  </fieldset>
    <input name="submit" type="submit" value="submit">
</div>
<script>
function fill_billing_address() {
  var address = document.getElementById("Adress").value;
  document.getElementById('BAdress').value = address;
  
  var city = document.getElementById("City").value;
  document.getElementById('BCity').value = city;
  
  var state = document.getElementById("State").value;
  document.getElementById('BState').value = state;
  
  var zip = document.getElementById("ZIP").value;
  document.getElementById('BZIP').value = zip;
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