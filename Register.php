<!DOCTYPE html>
<html>
  <head><title>Register a New Account</title></head>
 	<link type='text/css' rel='stylesheet' href='style.css'/>
  <body>
  	<img src="http://imgur.com/MJw1ovr.jpg"/>
  	<form name="adderer" action="register.php" method="post" id="register">
	<table>
		<tr><td>First Name:</td>                    <input type="text" name="fname" required><td></td></tr>
		<tr><td>Surname:</td><td>                   <input type="text" name="Lname" required></td></tr>
		<tr><td>Date of Birth (yyyy-mm-dd):</td><td><input type="date" name="dob" required></td></tr>
		<tr><td>Email:</td><td>                   <input type="text" name="email" required></td></tr>
		<tr><td>Phone Number:</td><td>              <input type="text" name="phnum" required></td></tr>
		<tr><td>Password:</td><td>                   <input type="text" name="Pass" required></td></tr>
		<tr><td>Account type:</td><td>              <select name="joe" required>
 													 <option value="Renter">Renter</option>
													 <option value="Storer">Storer</option>
													 <option value="Transporter">Transporter</option>
													</select></td></tr>
		<tr><td>Adress:</td><td>                   <input type="text" name="place" required></td></tr>
		<tr><td>Adress Description:</td><td>       <input type="text" name="descripacito" required></td></tr>
		<tr><td>Register:</td><td>                 <input type="submit" name="submit"></td></tr>

	</table>
</form>

</body>
<?php
if (isset($_POST['submit'])){
	//stuff to add to the table
	require('connect.php');

	$a = $_POST['fname'];
	$b = $_POST['Lname'];
	$c = $_POST['dob'];
	$d = $_POST['email'];
	$e = $_POST['phnum'];
	$f = $_POST['joe'];
	$g = hash('whirlpool',$_POST['Pass']);
	$Address = $_POST['place'];
	$Desc = $_POST['descripacito'];
//handle photos later
	$insert = 'insert into users(Fname,Lname,Bday,Email,Phnum,Acctype,Pass,Photo)
			 values("'.$a.'","'.$b.'","'.$c.'","'.$d.'","'.$e.'","'.$f.'","'.$g.'","JohnDoe.png")';
	mysqli_query($link,$insert);
///find the user being registered
	$queryy='select UID from users where Email = "'.$d.'";';
	$result= mysqli_query($link,$queryy);
    while($row = mysqli_fetch_row($result)) {
    $UsrID = $row[0] ;
     $locata  = 'insert into location(Lname,LDesc,Owner)
				values("'.$Address.'","'.$Desc.'",'.$UsrID.')';
     mysqli_query($link,$locata);
 }
}
?>
</body>
</html>
