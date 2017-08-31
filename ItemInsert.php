<!DOCTYPE html>
<html>
  <head><title>Register a Item</title></head>
 	<link type='text/css' rel='stylesheet' href='style.css'/>
  <body>
	  <form action="Homepage_loggedin.php" method="get">
		 <input type="submit" formaction="Homepage_loggedin.php" value="my items">
	  </form>
  	<img src="http://imgur.com/MJw1ovr.jpg"/><form name="adderer" action="register.php" method="post">
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
	$b = '0';             //0 is storage required, 1 is currently stored, 2 is retreived
  $c = $_SESSION['CurrentUser'];
	$d = $_SESSION['CurrentUser'];              //no storer not applicable
	$e = $_SESSION['CurrentLocation'];              //no storer not applicable
	$f = $_POST['desc'];
//handle photos later
	$insert = 'insert into items(IName,IStatus,Owner,Storer,Location,IDesc)
			 values ("'.$a.'","'.$b.'","'.$c.'","'.$d.'","'.$e.'","'.$f.'")';
	mysql_query($link,$insert);
}
?>
</body>
</html>
