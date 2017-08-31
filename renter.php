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
}
 ?>
  </body>
</html>
