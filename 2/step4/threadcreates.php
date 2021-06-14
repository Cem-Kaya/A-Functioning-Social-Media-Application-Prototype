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
	<tr> <th> uid </th> <th> tid </th> <th> tname </th> <th> tdate </th>  </tr>

<?php

include "config.php";

$sql_statement = "SELECT * FROM threadcreates";

$result = mysqli_query($db, $sql_statement);

while($row = mysqli_fetch_assoc($result))
{
	$tid = $row['tid'];
	$tname = $row['tname'];
	$tdate = $row['tdate'];
  $uid = $row['uid'];
	echo "<tr>" . "<th>" . $uid . "</th>" . "<th>" . $tid . "</th>" . "<th>". $tname . "</th>" . "<th>" . $tdate .  "</th>" ."</tr>";
}

?>

</table>




<form action="threadcreates.php" method="POST" >
<br> <br> <label for="attribute">Choose an attribute:</label> <br> <br>
  <select  name="attribute">
    <option tid="tid">tid</option> 
    <option uid="uid">uid</option>
    <option tname="tname">tname</option>
    
    
  </select>
  <br> <br> <label for="attribute2">Choose an operator:</label> <br> <br>
  <select  name="attribute2">
    <option Equal="=">=</option> 
    <option Greater=">">></option>
    <option Smaller="<"><</option>
    
  </select>
  <br> <br> <textarea name ="text" rows = "2" cols = "20" placeholder="type the value here"></textarea><br>
  <button type="send"> GO</button> <br>
  

</form>

</div>

<?php
include "config.php";
if($_POST){
  $attribute = $_POST["attribute"];
  $attribute2 = $_POST["attribute2"];
  $text = $_POST["text"];

  if($attribute2 == ">"){
    $sql_statement = "SELECT * FROM threadcreates WHERE $attribute > '$text' ";

    $result = mysqli_query($db, $sql_statement);

    echo "<table> <tr> <th> uid </th> <th> tid </th> <th> tname </th> <th> tdate </th> </tr> ";
    while($row = mysqli_fetch_assoc($result))
    {
    $uid = $row['uid'];
    $tid = $row['tid'];
    $tname = $row['tname'];
    $tdate = $row['tdate'];
    echo "<tr>" . "<th>" . $uid . "</th>" . "<th>". $tid . "</th>" . "<th>" . $tname . "</th>" ."<th>" . $tdate . "</th>" ."</tr>";
    }
    echo "</table>";
  }

  if($attribute2 == "="){
    $sql_statement = "SELECT * FROM threadcreates WHERE $attribute = '$text' ";

    $result2 = mysqli_query($db, $sql_statement);

    echo "<table> <tr> <th> uid </th> <th> tid </th> <th> tname </th> <th> tdate </th> </tr>";    
    while($row = mysqli_fetch_assoc($result2))
    {
    $uid1 = $row['uid'];
    $tid1 = $row['tid'];
    $tname1 = $row['tname'];
    $tdate1 = $row['tdate'];

    echo "<tr>" . "<th>" . $uid1 . "</th>" . "<th>". $tid1 . "</th>" . "<th>" . $tname1 . "</th>" ."<th>" . $tdate1 . "</th>" ."</tr>";
    }
    echo "</table>";
  }


  if($attribute2 == "<"){
    $sql_statement = "SELECT * FROM threadcreates WHERE $attribute < '$text'";
    
    $result3 = mysqli_query($db, $sql_statement);
    echo "<table> <tr> <th> uid </th> <th> tid </th> <th> tname </th> <th> tdate </th> </tr>";
    while($row = mysqli_fetch_assoc($result3))
    {
    $uid = $row['uid'];
    $tid = $row['tid'];
    $tname = $row['tname'];
    $tdate = $row['tdate'];

    echo "<tr>" . "<th>" . $uid . "</th>" . "<th>". $tid . "</th>" . "<th>" . $tname . "</th>" ."<th>" . $tdate . "</th>" ."</tr>";
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