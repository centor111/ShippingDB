<?php session_start() ?>
<!DOCTYPE html>
<html>
  <head><title>Login</title></head>
 	<link type='text/css' rel='stylesheet' href='style.css'/>
  <body>
  	<img src="http://imgur.com/MJw1ovr.jpg" align="middle"/>
  	<table width="300" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
<tr> <form name="login" method="post" action="login.php">  <td>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
<tr> <td colspan="3"><strong>Member Login </strong></td> </tr>
<tr> <td width="84">Email:</td>
<td width="294"><input name="myusername" type="text" id="myusername"></td> </tr>
<tr> <td>Password:</td>
<td><input name="mypassword" type="text" id="mypassword"></td></tr>
<tr> <td>&nbsp;</td>
<td>&nbsp;</td>
<td><input type="submit" name="submit" value="Login"></td> </tr>
</table></td></form></tr></table>

<?php
if (isset($_POST['submit'])){
	require('connect.php');
	$username = $_POST['myusername'];  //harvest
	//harvest the location for the session
	$search ='select LID from location where Owner = '.$username.';';
	$waldo  = mysqli_query($link,$search);
	while($rowrow = mysqli_fetch_row($waldo)){
	$UsrLocat = $rowrow[0];	
	}
	$_SESSION['currentlocation'] = $UsrLocat;//commit to the session

	$password = hash('whirlpool', $_POST['mypassword']); //encrypt the password
	$sql ="SELECT * from users where Email = '".$username."' and pass = '".$password."'";
	$result=mysqli_query($link,$sql);

	$count=mysqli_num_rows($result); //counting table rows
	echo($count);
	if($count==1){ // If result matched $myusername and $mypassword, table row must be 1 row
	$queryy='select UID from users where Email = "$username"';  ///find the accociated UID
	$result= mysqli_query($link,$queryy);
    while($row = mysqli_fetch_row($result)) {
    $UsrID = $row[0] ;
	$_SESSION['currentuser'] = $UsrID; //store to session
	header("Location: http://localhost/wairhouse/homepage_loggedin.php"); //redirect to homepage
	}
	}else {
	echo "Wrong Username or Password";
			}
}
?>
</body>
</html>
