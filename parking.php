<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="parking.css">
	<title>Parking</title>
	<style>
#txtHint {
  border-collapse: collapse;
  width: 100%;
}

#txtHint td, #txtHint th {
  border: 1px solid #ddd;
  padding: 8px;
}

#txtHint tr{
	background-color: #ddd;
}

#txtHint th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: center;
  background-color: #FA62E6;
  color: white;
}
	</style>
	
	<script>
		function showHint(str) {
		if (str.length == 0) { 
			document.getElementById("txtHint").innerHTML = "";
			return;
		} else {
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("txtHint").innerHTML = this.responseText;
			}
		};
    xmlhttp.open("GET", "check_available.php?data="+str, true);
    xmlhttp.send();
  }
}
</script>
</head>
<body>
<div class="centerText">
<div class="custFore">
<h1 class="custBg">Select Lot Space</h1>
<h3 class="custBg">Price: 1 to 6 is 3 dollar, 7 to 12 is 5 dollar, 13 to 18 is 12 dollar</h3>
<div class="grid-container">
  <div class="grid-item" id="profile" tabindex="0">1</div>
  <div class="grid-item" id="profile" tabindex="0">2</div>
  <div class="grid-item" id="profile" tabindex="0">3</div>  
  <div class="grid-item" id="profile" tabindex="0">4</div>
  <div class="grid-item" id="profile" tabindex="0">5</div>
  <div class="grid-item" id="profile" tabindex="0">6</div>  
</div>
<div class="grid-container">
  <div class="grid-item" id="profile" tabindex="0">7</div>
  <div class="grid-item" id="profile" tabindex="0">8</div>
  <div class="grid-item" id="profile" tabindex="0">9</div>  
  <div class="grid-item" id="profile" tabindex="0">10</div>
  <div class="grid-item" id="profile" tabindex="0">11</div>
  <div class="grid-item" id="profile" tabindex="0">12</div>  
</div>
<div class="grid-container">
  <div class="grid-item" id="profile" tabindex="0">13</div>
  <div class="grid-item" id="profile" tabindex="0">14</div>
  <div class="grid-item" id="profile" tabindex="0">15</div>  
  <div class="grid-item" id="profile" tabindex="0">16</div>
  <div class="grid-item" id="profile" tabindex="0">17</div>
  <div class="grid-item" id="profile" tabindex="0">18</div>  
</div>
</br>
<form class="custBg" action="card_info.php" method="POST" name="Input Date">
		<label>Input Date and Number</label>
			<div>
			Date (MM/DD/YYYY): <input type="text" name="Date" onkeyup="showHint(this.value)" required >
			Number: <input type="text" name="Number" required >
			</div>
			<input name="submit" type="submit" value="Pay for Parking" class="buttonCustom">
</form>
</div>
<h1 class="custBg">Unavailable Spot</h1>
<div><table id="txtHint"></table></div>
</div>
</body>
</html>