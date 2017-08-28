<!DOCTYPE html>
<html>
  <head
   </head>
  <body>
    <img src="http://imgur.com/MJw1ovr.jpg"/>
  <?PHP
  switch (select acctype from users where UID = $currentuser) {
    case 0:
      ?>
  	
  	<form name="regitem" action="register.php" method="post" id="register">
	<table>
		<tr><td>Item Name:</td>                    <input type="text" name="iname" required><td></td></tr>
		<tr><td>Item Description:</td><td>                   <input type="text" name="Idesc" required></td></tr> 													
		<tr><td>Submit item:</td><td>                 <input type="submit" name="submit"></td></tr>

	</table>
</form>

</body>
<?php
if (isset($_POST['submit'])){
	//stuff to add to the table
	require('connect.php');
	$a = $_POST['Iname'];
	$b = $_POST['Idesc'];
  $c = $_Session['Currentuser'];
  $d = 0;
  $e = $_Session['CurrentLocation'];
	$insert = 'insert into Items(IName, IDesc, Owner, Storer, IStatus, ILocation)
			 values("'.$a.'","'.$b.'","'.$c.'","'.$c.'","'.$d.'","'.$e.'")';
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
    
    
    
    <table>
    <TR>
        Require(iteminsert.php);
        $myitems = 'Select IID, IName, IDesc, Storer, ILocation from items where ((owner = '.$currentuser.') and (IStatus = 1)'
        Echo 'stored items:'
        mysqli_query($link,$myitems);
        $nyitems = 'Select IID, IName, IDesc, Storer, ILocation from items where ((owner = '.$currentuser.') and (IStatus = 0)'
        Echo 'current ads'
        mysqli_query($link,$nyitems);
        
        break;
    case 1:
        Require(storer.php);
        break;
    case 2:
        Require(transporter.php);
        break;
}
  ?>
</html>
