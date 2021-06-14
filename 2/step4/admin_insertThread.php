<?php

include "config.php";

 
$tname = $_POST['tname'];

$tdate = date("y/m/d");


echo $tname . "<br>". $tdate . "<br>" ;

$sql_statement = "INSERT INTO thread(tname, tdate)
					VALUES ('$tname', '$tdate')";

$result = mysqli_query($db, $sql_statement);



header ("Location: adminInsertThread.php");



?>