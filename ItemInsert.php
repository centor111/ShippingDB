<!DOCTYPE html>
<?php session_start() ?>
<html>
  <head><title>Register a Item</title></head>
 	<link type='text/css' rel='stylesheet' href='style.css'/>
  <body>
	  <img src="http://imgur.com/MJw1ovr.jpg"/>
 
	  <form name="newitem" action="iteminsert.php" method="post" id="newitem">
	<table>
		<tr><td>Item Name:</td>                    <input type="text" name="itmname"><td></td></tr>
		<tr><td>Description:</td><td>                   <input type="text" name="desc"></td></tr>
		<tr><td>Register:</td><td>                 <input type="submit" name="submit"></td></tr>
	</table>
</form>

</body>
<?php
if (isset($_POST['submit'])){
	//stuff to add to the table
	require('connect.php');
	$a = $_POST['itmname'];
	$b = 'live';             //need to change these to numbers...
  $c = $_SESSION['currentuser'];
	$d = $_SESSION['currentuser'];              //no storer on creation, set it to the owner (renter)
	$e = $_SESSION['currentlocation'];              //set the location of the item to the renter's home
	$f = $_POST['desc'];
//handle photos later
	$insert = 'insert into items(IName,IStatus,Owner,Storer,Location,IDesc)
			 values ("'.$a.'","'.$b.'",'.$c.','.$d.','.$e.',"'.$f.'")';
	mysqli_query($link,$insert);
	echo "Successfully Added!";
}
?>
		<form name="return" action="iteminsert.php" method="post" id="return">
		<input type="submit" formaction="Homepage_loggedin.php" value="Return"> 
</form>
</body>
</html>
