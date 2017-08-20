<?php
//set up connections to the databast

define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_DATABASE", "wairhouse");

//build a bridge to the server
$link = mysqli_connect("localhost", "root", "")  or die("Unable to connect");
mysqli_select_db($link,"wairhouse") or die('Problems connecting to database');

?>

