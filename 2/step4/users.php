<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<title>Users</title>

<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>

<body>
	<div align="center"> 
<table>
	<tr> <th> ID </th> <th> Username </th> <th> P_url </th> <th> Info </th> <th> Join_date </th> <th> Email </th> <th> Password </th> </tr>

<?php

include "config.php";

$sql_statement = "SELECT * FROM users";

$result = mysqli_query($db, $sql_statement);

while($row = mysqli_fetch_assoc($result))
{
	$username = $row['Username'];
	$p_url = $row['Picture_profile_url'];
	$id = $row['uid'];
	$info = $row['Info'];
	$join_date = $row['Join_date'];
	$email = $row['Email'];
	$password = $row['Password'];
	echo "<tr>" . "<th>" . $id . "</th>" . "<th>". $username . "</th>" . "<th>" . $p_url . "</th>" ."<th>" . $info . "</th>" ."<th>" . $join_date . "</th>" ."<th>" . $email . "</th>" . "<th>" . $password . "</th>" ."</tr>";
}

?>

</table>
  
  <div align="center">
<form action="users.php" method="POST" >
<br> <br>  <label for="attribute">Choose an attribute:</label> <br> <br> 
  <select  name="attribute">
    <option Username="Username">Username</option> 
    <option ID="uid">uid</option>
    <option Email="Email">email</option>
    <option Password="Password">Password</option>
    
  </select>
  <br> <br>  <label for="attribute2">Choose an operator:</label> <br> <br> 
  <select  name="attribute2">
    <option Equal="=">=</option> 
    <option Greater=">">></option>
    <option Smaller="<"><</option>
    
  </select>
  <textarea name ="text" rows = "2" cols = "20" placeholder="type the value here"></textarea><br>

  <button type="send"> GO</button> <br>
  
  </div>
</form>



<?php
include "config.php";
if($_POST){
  $attribute = $_POST["attribute"];
  $attribute2 = $_POST["attribute2"];
  $text = $_POST["text"];

  if($attribute2 == ">"){
    $sql_statement = "SELECT * FROM users WHERE $attribute > '$text' ";

    $result = mysqli_query($db, $sql_statement);

    echo "<table> <tr> <th> ID </th> <th> Username </th> <th> P_url </th> <th> Info </th> <th> Join_date </th> <th> Email </th> <th> Password </th> </tr>";
    while($row = mysqli_fetch_assoc($result))
    {
    $username1 = $row['Username'];
    $p_url1 = $row['Picture_profile_url'];
    $id1 = $row['uid'];
    $info1 = $row['Info'];
    $join_date1 = $row['Join_date'];
    $email1 = $row['Email'];
    $password1 = $row['Password'];
    echo "<tr>" . "<th>" . $id1 . "</th>" . "<th>". $username1 . "</th>" . "<th>" . $p_url1 . "</th>" ."<th>" . $info1 . "</th>" ."<th>" . $join_date1 . "</th>" ."<th>" . $email1 . "</th>" . "<th>" . $password1 . "</th>" ."</tr>";
    }
    echo "</table>";
  }

  if($attribute2 == "="){
    $sql_statement = "SELECT * FROM users WHERE $attribute = '$text' ";

    $result2 = mysqli_query($db, $sql_statement);

    echo "<table> <tr> <th> ID </th> <th> Username </th> <th> P_url </th> <th> Info </th> <th> Join_date </th> <th> Email </th> <th> Password </th> </tr>";
    while($row = mysqli_fetch_assoc($result2))
    {
    $username1 = $row['Username'];
    $p_url1 = $row['Picture_profile_url'];
    $id1 = $row['uid'];
    $info1 = $row['Info'];
    $join_date1 = $row['Join_date'];
    $email1 = $row['Email'];
    $password1 = $row['Password'];
    echo "<tr>" . "<th>" . $id1 . "</th>" . "<th>". $username1 . "</th>" . "<th>" . $p_url1 . "</th>" ."<th>" . $info1 . "</th>" ."<th>" . $join_date1 . "</th>" ."<th>" . $email1 . "</th>" . "<th>" . $password1 . "</th>" ."</tr>";
    }
    echo "</table>";
  }


  if($attribute2 == "<"){
    $sql_statement = "SELECT * FROM users WHERE $attribute < '$text'";
    
    $result3 = mysqli_query($db, $sql_statement);
    echo "<table> <tr> <th> ID </th> <th> Username </th> <th> P_url </th> <th> Info </th> <th> Join_date </th> <th> Email </th> <th> Password </th> </tr>";
    while($row = mysqli_fetch_assoc($result3))
    {
    $username1 = $row['Username'];
    $p_url1 = $row['Picture_profile_url'];
    $id1 = $row['uid'];
    $info1 = $row['Info'];
    $join_date1 = $row['Join_date'];
    $email1 = $row['Email'];
    $password1 = $row['Password'];
    echo "<tr>" . "<th>" . $id1 . "</th>" . "<th>". $username1 . "</th>" . "<th>" . $p_url1 . "</th>" ."<th>" . $info1 . "</th>" ."<th>" . $join_date1 . "</th>" ."<th>" . $email1 . "</th>" . "<th>" . $password1 . "</th>" ."</tr>";
    }
    echo "</table>";
  }

}
?>













<footer> 
        <a href="./index.php"> Go to First Page </a> <br> 
    </footer>

</body>
</html>