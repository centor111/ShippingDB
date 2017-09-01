<!DOCTYPE html>
<?php session_start() //start the session ?>
<html>
  <head><title>My Items</title><head>
  <link type='text/css' rel='stylesheet' href='style.css'/>
    <title>WAirHouse</title>
  <body>
    <img src="http://imgur.com/MJw1ovr.jpg"/>
    <form action="Homepage_loggedin.php" method="get">
     <input type="submit" formaction="Homepage_loggedin.php" value="home">
    </form>
 <?php  
 $user = $_SESSION['currentuser'];
 //query engine 
 require('connect.php');
 print "The Items you own: ";
 $query = "Select * from Items where owner = $user";  //Find the items stored by the user
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
          <td>".$row["IName"]."</td><td>".$row["Owner"]."</td><td>".$row["Location"]."</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo " You have no items. registe one to get started and join the fun!";
}
 ?>
  </body>
</html>
