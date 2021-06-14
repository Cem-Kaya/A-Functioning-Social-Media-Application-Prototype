<?php

include "config.php";



$username = $_POST['username'];

$password = $_POST['password'];

$email = $_POST['email'];

$p_url = $_POST['Picture_URL'];

$info = $_POST['info'];

$joindate = date("y/m/d") ; 



$con = mysqli_connect('localhost', 'root','','project_db1');

mysqli_select_db($con, 'project_db1');

$sql_emailExists = "SELECT * FROM users WHERE Email = '$email'";

$result1 = mysqli_query($con, $sql_emailExists);

$num = mysqli_num_rows($result1);



if($num == 1){
	echo "EMAIL IS ALREADY IN USE" . "<br>";
	echo " <a href=\"./login.php\"> Go back to Login Screen </a>" ;
}
else{

	$sql_statement = "INSERT INTO users(Username, Password, Picture_profile_url, Info, Email, Join_date)
					VALUES ('$username', '$password', '$p_url',  '$info', '$email', '$joindate')";

	$result2 = mysqli_query($db, $sql_statement);

	echo "REGISTRATION SUCCESSFUL" . "<br>";
	echo " <a href=\"./login.php\"> Go back to Login Screen </a>" ;

}

header ("Location: login.php");
?>