<!DOCTYPE html>
<?php session_start() ?>
<html>
	<head><title>Transfer an Item</title><head>
 	<link type='text/css' rel='stylesheet' href='style.css'/>
    <title>WAirHouse</title>
  <body>
  	<img src="http://imgur.com/MJw1ovr.jpg"/>
    <form action="Homepage_loggedin.php" method="get">
		 <input type="submit" formaction="Homepage_loggedin.php" value="home">
	  </form>
 <?php  
 $user = $_SESSION['currentuser'];
 require('connect.php');
 $summStorer = "SELECT UID, Fname, Lname, Phnum FROM users WHERE AccType = 'Storer'"; //find some storers
 $rresult = mysqli_query($link,$summStorer);  
 $rrows = mysqli_num_rows($rresult); 
 $ccolumns = mysqli_num_fields($rresult);    
//format the table of users
 if ($rresult->num_rows > 1) {
    echo "<table border= 1>
      <tr>
        <th>UID</th>
        <th>Name</th>
        <th>Phone number</th>
        </tr>";
    // output data of each row
    while($roww = mysqli_fetch_row()) {
        echo "<tr>
          <td>".$roww["UID"]."</td><td>".$roww["Fname"].$roww["Lname"]."</td><td>".$roww["Phone Number"]."</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "There are no Storers currently catered to your Item :("; 
  }

//Items table
  $itemm = "Select * from Items where Owner = $user";  //Find the items the user owns
 $result = mysqli_query($link,$itemm);  
 $rows = mysqli_num_rows($result);   
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
} //user decision on transfer
?>
<form name="harvester" action="renter.php" method="post" id="register">
  <table>
    <tr><td>Item ID:</td>                    <input type="number" name="item" required><td></td></tr>
    <tr><td>Storer ID:</td><td>                   <input type="number" name="storer" required></td></tr>
    <tr><td>Register:</td><td>                 <input type="submit" name="submit"></td></tr>
  </table>
  </form>
<?php
if (isset($_POST['submit'])){ //harvest the user's selection
  $IID = $_POST['item'];
  $SID = $_POST['storer'];

  //Check for valid combination
  $sql = 'SELECT IID, Storer from Items where IID ='.$IID.' and Storer = '.$user.'';
  $out = mysqli_query($link, $sql); 
  $count = mysqli_num_rows($out); //counting table rows

  if ($count == 1) {
    $update = 'UPDATE items set Owner = '.$SID.' WHERE IID = '.$IID.' and Storer = '.$user.''; //Update table statement 
    mysqli_query($link,$update);
    $store = "INSERT INTO events (Item, Location, Rate) 
              values(".$IID.",".$locat.",10)"; //10 will be replaced with a storer chosen price in later versions
