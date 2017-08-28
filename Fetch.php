<!DOCTYPE html>
<html>
  <head>
  <head>
 	<link type='text/css' rel='stylesheet' href='style.css'/>
    <title>WAirHouse</title>
  <body>
  	<img src="http://imgur.com/MJw1ovr.jpg"/>
 <?php    
 $user = 1;                        //////IMPORTANT ~~~~ TEMPORARY.
 //phpinfo();
 //query engine 
 require('connect.php');
 print "The Items you currently have registered:";
 $query = stripslashes("Select * from Items where Owner = $_SESSION['currentuser']");  //Find the items the user owns
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
 ?>
  </body>
</html>
