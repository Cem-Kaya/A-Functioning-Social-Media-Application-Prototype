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
	<tr> <th> cid(replied under cid2) </th> <th> text </th> <th> uid </th> <th> pid </th> <th> wdate </th> <th> cid2 </th>  </tr>

<?php

include "config.php";

$sql_statement = "SELECT * FROM comment";

$result = mysqli_query($db, $sql_statement);





while($row = mysqli_fetch_assoc($result))
{
	$cid = $row['cid'];
	$text = $row['text'];


    $sql_statement2 = "SELECT *  FROM writes WHERE cid= $cid ";
    $result2 = mysqli_query($db, $sql_statement2);
    $row2 = mysqli_fetch_assoc($result2);
    $uid = $row2['uid'];
    $pid = $row2['pid'];
    $wdate = $row2['wdate'];   

    
    $sql_statement3 = "SELECT * FROM reply_under WHERE cid1 =$cid";
    $result3 = mysqli_query($db, $sql_statement3);
    $row3 = mysqli_fetch_assoc($result3);
    $cid2 = $row3['cid2'];
      


	echo "<tr>" . "<th>" . $cid . "</th>" . "<th>" .$text . "</th>" . "<th>" . $uid . "</th>" . "<th>" . $pid . "</th>" . "<th>". $wdate ."</th>". "<th>" . $cid2 . "</th>" ."</tr>";
}

?>

</table>

<form action="comment.php" method="POST" >
<br> <br> <label for="attribute">Choose an attribute:</label> <br> <br>
  <select  name="attribute">
    <option cid="cid">cid</option> 
    <option text="text">text</option>
    <option uid="uid">uid</option> 
    <option pid="pid">pid</option>
    <option cid2="cid2">cid2</option> 
       
  </select>
  <br> <br> <label for="attribute2">Choose an operator:</label> <br> <br>
  <select  name="attribute2">
    <option Equal="=">=</option> 
    <option Greater=">">></option>
    <option Smaller="<"><</option>
    
  </select>
  <br> <br> <textarea name ="text" rows = "1" cols = "20" placeholder="type the value here"></textarea><br><br>

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
    $sql_statement = "SELECT *
                      FROM( SELECT DISTINCT tp.cid , tp.text , tp.pid , tp.uid , tp.wdate , R.cid2
                            FROM (  SELECT C.cid , C.text , W.pid , W.uid , W.wdate 
                                    FROM comment C 
                                    LEFT JOIN writes W ON C.cid = W.cid ) AS tp 
                            LEFT JOIN reply_under R ON tp.cid = R.cid1 ) AS TTP
                      WHERE TTP.$attribute > '$text' ";
                     

    $result = mysqli_query($db, $sql_statement);

    echo "<table> <tr> <th> cid </th> <th> text </th> <th> uid </th> <th> pid</th> <th> wdate </th> <th> cid2 </th> </tr> ";
    while($row = mysqli_fetch_assoc($result))
    {
    $cid = $row['cid'];
    $cid2 = $row['cid2'];
    $pid = $row['pid'];
    $uid = $row['uid'];
    $text= $row['text'];
    $wdate = $row2['wdate']; 
    echo "<tr>" . "<th>" . $cid . "</th>" . "<th>" .$text . "</th>" . "<th>" . $uid . "</th>" . "<th>" . $pid . "</th>" . "<th>". $wdate ."</th>". "<th>" . $cid2 . "</th>" ."</tr>";
    }
    echo "</table>";
  }

  if($attribute2 == "="){
    $sql_statement = "SELECT *
                      FROM( SELECT DISTINCT tp.cid , tp.text , tp.pid , tp.uid , tp.wdate , R.cid2
                            FROM (  SELECT C.cid , C.text , W.pid , W.uid , W.wdate 
                                    FROM comment C 
                                    LEFT JOIN writes W ON C.cid = W.cid ) AS tp 
                            LEFT JOIN reply_under R ON tp.cid = R.cid1 ) AS TTP
                      WHERE TTP.$attribute = '$text' ";
                     

    $result = mysqli_query($db, $sql_statement);

    echo "<table> <tr> <th> cid </th> <th> text </th> <th> uid </th> <th> pid</th> <th> wdate </th> <th> cid2 </th> </tr> ";
    while($row = mysqli_fetch_assoc($result))
    {
    $cid = $row['cid'];
    $cid2 = $row['cid2'];
    $pid = $row['pid'];
    $uid = $row['uid'];
    $text= $row['text'];
    $wdate = $row2['wdate']; 
    echo "<tr>" . "<th>" . $cid . "</th>" . "<th>" .$text . "</th>" . "<th>" . $uid . "</th>" . "<th>" . $pid . "</th>" . "<th>". $wdate ."</th>". "<th>" . $cid2 . "</th>" ."</tr>";
    }
    echo "</table>";
  }


  if($attribute2 == "<"){
    $sql_statement = "SELECT *
                      FROM( SELECT DISTINCT tp.cid , tp.text , tp.pid , tp.uid , tp.wdate , R.cid2
                            FROM (  SELECT C.cid , C.text , W.pid , W.uid , W.wdate 
                                    FROM comment C 
                                    LEFT JOIN writes W ON C.cid = W.cid ) AS tp 
                            LEFT JOIN reply_under R ON tp.cid = R.cid1 ) AS TTP
                      WHERE TTP.$attribute < '$text' ";
                     

    $result = mysqli_query($db, $sql_statement);

    echo "<table> <tr> <th> cid </th> <th> text </th> <th> uid </th> <th> pid</th> <th> wdate </th> <th> cid2 </th> </tr> ";
    while($row = mysqli_fetch_assoc($result))
    {
    $cid = $row['cid'];
    $cid2 = $row['cid2'];
    $pid = $row['pid'];
    $uid = $row['uid'];
    $text= $row['text'];
    $wdate = $row2['wdate']; 
    echo "<tr>" . "<th>" . $cid . "</th>" . "<th>" .$text . "</th>" . "<th>" . $uid . "</th>" . "<th>" . $pid . "</th>" . "<th>". $wdate ."</th>". "<th>" . $cid2 . "</th>" ."</tr>";
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