<!DOCTYPE html>
<html>
  <head>
  <head>
 	<link type='text/css' rel='stylesheet' href='style.css'/>
    <title>WAirHouse</title>
  <body>
  	<img src="http://imgur.com/MJw1ovr.jpg"/>
 <?php    
 $user = 1;
 //phpinfo();
 //query engine 
 define("DB_HOST", "192.168.0.26");
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_DATABASE", "databasename");
 $link = mysqli_connect("localhost", "root", "")  or die("Unable to connect");
 print "The Items you currently have registered:";
 mysqli_select_db($link,"wairhouse") or die("Unable to select database");
 $query = stripslashes("Select * from Items where Owner = $user");  //Find the user
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
    while($row = $result->fetch_assoc()) {
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
