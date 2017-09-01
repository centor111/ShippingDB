<!DOCTYPE html>
<?php session_start() ?>
<html>
	<head><title>Homepage</title></head>
  <body>
    <img src="http://imgur.com/MJw1ovr.jpg"/>
    <link type='text/css' rel='stylesheet' href='style.css'/>
	  <form action="Homepage_loggedin.php" method="post">
 		<input type="submit" action="post" name="submit" value="Log out"> 
	  </form>
  <?php
    require('connect.php');
	  if (isset($_POST['submit'])){ //end the session when this button is clicked
		  session_unset(); 
		  session_destroy();
      echo('Logged Out.');
	  } else {
      $user =$_SESSION['currentuser']; //find out who the current user is
      $test ='SELECT acctype from users where UID = '.$user.'';
      $result = mysqli_query($link, $test);
      while($row = mysqli_fetch_row($result)) {
      $testquery = $row[0] ; //plate up

      switch ($testquery) {
      case "renter": //if the current user is a renter
      ?> 
      <form action="Homepage_loggedin.php" method="get">
      <input type="submit" formaction="fetch.php" value="my items"> 
      <input type="submit" formaction="iteminsert.php" value="create new ad">
      <input type="submit" formaction="Renter.php" value="store an item"> 
      <input type="submit" formaction="unstore.php" value="take an item out of storage">
      </form> 
      <?php
        break;
      case "storer": //if the current user is a storer
	    ?>
       <form action="Homepage_loggedin.php" method="get">
       <input type="submit" formaction="storefetch.php" value="my items"> 
	     </form>
	    <?php
        break;
    case "transporter": //if the current user is a transporter. (Not implemented)
        Echo "Work in Progress";
        break;
      }
      }
  }
  ?>
</html>
