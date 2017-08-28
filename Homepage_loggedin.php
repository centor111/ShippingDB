<!DOCTYPE html>
<html>
  <head
   </head>
  <body>
    <img src="http://imgur.com/MJw1ovr.jpg"/>
	  <form action="Homepage_loggedin.php" method="post">
 		<input type="submit" action="post" name="submit" value="Log out"> 
	  </form>
  <?php
	  if (isset($_POST['submit'])){
		  session_unset(); 
		session_destroy();
	  } else {
  switch (mysql_query($link,'select acctype from users where UID = '.$_SESSION['currentuser'].'') {
    case "renter":
      ?> 
      <form action="Homepage_loggedin.php" method="get">
 <input type="submit" formaction="fetch.php" value="my items"> 
 <input type="submit" formaction="iteminsert.php" value="create new ad">
 <input type="submit" formaction="Renter.php" value="store an item"> 
 <input type="submit" formaction="unstore.php" value="Submit to Page3">
    </form> 
    <?php
        break;
    case "storer":
	 
	  if (isset($_POST['submit'])){
		  session_unset(); 
		session_destroy();
	  } else { ?>
       <form action="Homepage_loggedin.php" method="get">
 <input type="submit" formaction="storefetch.php" value="my items"> 
	</form>
	  <?php }
	  
        break;
    case "transporter":
        Echo "Work in Progress";
        break;
}}
  ?>
</html>
