<!DOCTYPE html>
<html>
	<table>
		<tr><td>Item ID</td>                    <input type="text" name="IID"><td></td></tr>
		<tr><td>Find item:<td><td>                 <input type="submit" name="submit"></td></tr>
	</table>
</form>

</body>
<?php
if (isset($_POST['submit'])){
	//stuff to add to the table
  $a = $_POST['IID'];
  $mystoreditems = 'select count(*) from items where ((IID = '.$a.') and (Owner = '.$_Session['currentuser'].') and (Status = 1)'
  $valid = mysqli_query($link,$mystoreditems);
  if($valid == 1) {
    $Update = 'Update items
               set IStatus = 2, Storer = '.$_SESSION['Currentuser'].', Location = '.$_SESSION['Currentlocation'].'
               where ((IID = '.$a.') and (Owner = '.$_Session['currentuser'].') and (Status = 1)'
    mysql_query($link,$Update);
    
		
  
  
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
