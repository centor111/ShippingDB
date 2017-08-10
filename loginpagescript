<?php

require('loginscript.php'); 
//remember $username and $password taken as variables

$ok = 0;  //assume nothing is ok, collect evidence to prove otherwise

if(isset($_POST["submit"]))
{
	//submit clicked, user possibly logged in - check
	$account = $_POST['user'];
	$inpw = $_POST['pw'];

	$verify = 'select * from users where email="'.$account.'"';

	$answertable = mysql_query($verify, $connection);

	if (!$answertable){
	  	echo 'Invalid username or password';
	}else{
		//retrieve password for that user
	  	list($user, $pass) = mysql_fetch_row($answertable);

	  	if (whirlpool($inpw) == $pass){

            $ok = 1; //valid user and password, meaning all is OK
	  		echo 'Welcome '.$usr;

	  		//do stuff here because you have a valid user
	  		echo '<br><a href="login.php">logout</a>';


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
