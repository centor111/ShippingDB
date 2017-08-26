<!DOCTYPE html>
<html>
  <head>
  <head>
 	<link type='text/css' rel='stylesheet' href='style.css'/>
    <title>WAirHouse</title>
  <body>
  	<img src="http://imgur.com/MJw1ovr.jpg"/>
 <?php    
 require('connect.php');
 $query = "Select UID,Fname,Lname,Phnum from users where Acctype = 'Storer'";
 $result = mysqli_query($link,$query);  
 $rows = mysqli_num_rows($result); 
 $columns = mysqli_num_fields($result);    

 if ($result->num_rows > 0) {
    echo "<table border= 1>
      <tr>
        <th>UID</th>
        <th>Name</th>
        <th>Phone number</th>
        </tr>";
    // output data of each row
    while($row = mysqli_fetch_row()) {
        echo "<tr>
          <td>".$row["UID"]."</td><td>".$row["Fname"].$row["Lname"]."</td><td>".$row["Phone Number"]."</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "There are no Storers currently catered to your Item :(";
 ?>
  </body>
</html>
