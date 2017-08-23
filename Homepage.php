<!DOCTYPE html>
<html>
  <head>
   </head>
  <body>
    <?php
    $_post['item']='';  
    $_post['description']='';
    $_post['CurrrentUser'}='';
    ?> 
    <form name="Adoption" method="post" action=">
      <p> Item name: <input type="text" name="item" value="<?php echo $_post['item']; ?>"></p>
      <p> Item description: <input type="text" name="description" value="<?php echo $_post['description']; ?>"></p>         
    </form>
                                                                                                              <?php

require('listallusers.php'); 
//remember $username and $password taken as variables

$ok = 0;  //assume nothing is ok, collect evidence to prove otherwise

if(isset($_POST["submit"]))
{
	//submit clicked, user possibly logged in - check
	$who = $_POST['user'];
	$pw = $_POST['pw'];

	$verify = 'select * from usersPW where user="'.$who.'"';

	$answertable = mysql_query($verify, $connection);

	if (!$answertable){
	  	echo 'Invalid username or password';
	}else{
		//retrieve password for that user
	  	list($usr, $pwd) = mysql_fetch_row($answertable);

	  	if (Whirlpool($pw) == $pwd){

            $ok = 1; //valid user and password, meaning all is OK
	  		echo 'Welcome '.$usr;

	  		//do stuff here because you have a valid user
	  		echo '<br><a href="login.php">logout</a>';
			$userval = 'select uid from usersPW where user="'.$usr.'"'
			$locval = 'select Lname from location where owner="'.$userval.'"'
			$_SESSION['CurrentUser']=mysql_query($userval, $connection);
			$_SESSION['CurrentLocation']=mysql_query($locval, $connection);
			
			
	  	}else{
	  		echo 'Invalid username or password, try again.<br><br>';
	  	}
	}
}

if (!$ok)  //either login was wrong or not yet tried
           // so present form to gather login details
{
?>
	<form method="post" action="login.php">
	Username: <input name="user" type="text" value="type your name here"><br>
	Password: <input name="pw" type="password"><br>
	<input name="submit" value="login" type="submit">
	</form>
<?php
}
?>
  </body>
</html>
