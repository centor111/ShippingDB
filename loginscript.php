<html>
<head><title>please do not read me</title></head>
<?php
//esttablish variables
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'wairhouse';

//build a bridge to the server
$connection = mysql_connect($host,$username,$password) or die('problems connecting to the server');

//connect to the server through that bridge
mysql_select_db($dbname) or die('problems connecting to the server');

//retreive data
$myquery = 'select email, pass from users order by user';

$answertable = mysql_query($myquery);

if(!$answertable){
	echo 'no data'; 
}else {
	//get the retreived data
	//echo 'data found';
	while(list($email,$pass) = mysql_fetch_row($answertable));
		echo '<br />'.$usr.',';
		echo $;
}

?>
</html>
