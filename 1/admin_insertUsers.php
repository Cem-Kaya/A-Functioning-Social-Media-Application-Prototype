<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Insert User</title>
</head>
<body>

<?php

include "config.php";

$username = $_POST['username'];

$password = $_POST['password'];

$email = $_POST['email'];

$p_url = $_POST['p_url'];

$info = $_POST['info'];

$joindate = date("y/m/d") ; #$_POST['joindate'];

echo $username . "<br>". $password . "<br>" . $email . "<br>" . $p_url . "<br>". $info . "<br>" . $joindate . "<br>" ;

$sql_statement = "INSERT INTO users(Username, Password, Picture_profile_url, Info, Email, Join_date)
					VALUES ('$username', '$password', '$p_url',  '$info', '$email', '$joindate')";

$result = mysqli_query($db, $sql_statement);

header ("Location: adminInsertUser.php");

?>
    <footer> 
        <a href="./index.php"> Go to First Page </a> <br> 
    </footer>
</body>
</html>


