<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Insert Thread Creates </title>
</head>
<body>
    
	<?php

	include "config.php";

	
	$tname = $_POST['tname'];

	$tdate = date("y/m/d");
	$uid = $_POST['uid'];

	echo $tname . "<br>". $tdate . "<br>" . $uid . "<br>" ;

	$sql_statement = "INSERT INTO threadcreates(tname, tdate, uid)
						VALUES ('$tname', '$tdate','$uid')";

	$result = mysqli_query($db, $sql_statement);

	header ("Location: adminInsertThreadCreates.php");

	?>
    <footer> 
        <a href="./index.php"> Go to First Page </a> <br> 
    </footer>
</body>
</html>


