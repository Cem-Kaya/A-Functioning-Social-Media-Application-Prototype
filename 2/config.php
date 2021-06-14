<?php

$db = mysqli_connect('localhost','root','','project_db1');

if($db->connect_errno > 0){
	die('Unable to connect to database [' . $db->connect_error . ']');
}


?>