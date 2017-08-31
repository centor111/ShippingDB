<!DOCTYPE html>
<?php session_start() ?>
<html>
  <head><title>Retrieve an Item</title></head>
 	<link type='text/css' rel='stylesheet' href='style.css'/>
  <body>
  	<img src="http://imgur.com/MJw1ovr.jpg"/>
  	<form name="finder" action="unstore.php" method="post" id="unstore">
	<table>
		<tr><td>Item ID</td>                    <input type="text" name="IID"><td></td></tr>
		<tr><td>Find item:<td><td>                 <input type="submit" name="submit"></td></tr>
	</table>
</form>
<?php
require('connect.php');
$user = $_SESSION['currentuser'];
print "The Items you currently have registered:";
 $query = "Select * from Items where Owner = ".$user."";  //Find the items the user owns
 $result = mysqli_query($link,$query);  
 $rows = mysqli_num_rows($result); 
 //print "There are  $rows results<p>";  
 $columns = mysqli_num_fields($result);    

 if ($result->num_rows > 0) {
    echo "<table border= 1>
      <tr>
        <th>Item</th>
        <th>Storer</th>
        <th>Location</th>
        </tr>";
    // output data of each row
    while($row = mysqli_fetch_row()) {
        echo "<tr>
          <td>".$row["IName"]."</td><td>".$row["Storer"]."</td><td>".$row["Location"]."</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "You have no registered items :(";
}
if (isset($_POST['submit'])){
	//stuff to add to the table
  $a = $_POST['IID'];
  $mystoreditems = 'select count(*) from items where ((IID = '.$a.') and (Owner = '.$_Session['currentuser'].') and (Status = "Live")';
  $valid = mysqli_query($link,$mystoreditems);
  if($valid == 1) {
    $Update = 'Update items
               set IStatus = "Retrieved, Storer = '.$user.', Location = '.$_SESSION['Currentlocation'].'
               where ((IID = '.$a.') and (Owner = '.$user.') and (Status = "stored")';
    mysql_query($link,$Update);
}
}
?>
<form action="Homepage_loggedin.php" method="get">
		 <input type="submit" formaction="Homepage_loggedin.php" value="home">
	  </form>
</body>
</html>
