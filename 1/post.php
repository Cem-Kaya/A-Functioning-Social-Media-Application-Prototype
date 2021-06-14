<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="style.css">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Post</title>

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
	<tr> <th> pid </th> <th> likes </th> <th> dislikes </th> <th> text </th>  <th> picture_url </th>  <th> video_url </th> <th> uid </th><th> tid </th></tr>

<?php

include "config.php";

$sql_statement = "SELECT * FROM post";


$result = mysqli_query($db, $sql_statement);


while($row = mysqli_fetch_assoc($result))
{
	$pid = $row['pid'];
	$likes = $row['likes'];
	$dislikes = $row['dislikes'];
    $text = $row['text']; 

    $sql_statementVideo = "SELECT video_URL  FROM video_post WHERE pid= $pid ";
    $sql_statementPicture = "SELECT picture_URL FROM picture_post WHERE pid=$pid";
    
    $sql_statementUidTid = "SELECT * FROM makes WHERE pid=$pid";
    $result2 = mysqli_query($db, $sql_statementUidTid);
    $row2 = mysqli_fetch_assoc($result2);
    $uid = $row2['uid'];
    $tid = $row2['tid']; 

    $result_VideoUrl = mysqli_query($db, $sql_statementVideo);
    $result_PictureUrl = mysqli_query($db, $sql_statementPicture);


    $picture_url = mysqli_fetch_assoc($result_PictureUrl)["picture_URL"];
    $video_url = mysqli_fetch_assoc($result_VideoUrl)["video_URL"];
    
    
	echo "<tr>" . "<th>" . $pid . "</th>" . "<th>" . $likes . "</th>" . "<th>". $dislikes . "</th>" . "<th>" . $text .  "</th>" ."<th>" . $picture_url .  "</th>"."<th>" . $video_url ."</th>"."<th>" . $uid ."<th>" . $tid .   "</th>" . "</tr>";
}

?>

</table>




<form action="post.php" method="POST" >
<br> <br> <label for="attribute">Choose an attribute:</label> <br> <br>
  <select  name="attribute">
    <option pid="pid">pid</option> 
    <option likes="likes">likes</option>
    <option dislikes="dislikes">dislikes</option>
    <option text="text">text</option>
    <option uid="uid">uid</option>
    <option tid="tid">tid</option>    
  </select>
  
  <br> <br><label for="attribute2">Choose an operator:</label> <br> <br>
  <select  name="attribute2">
    <option Equal="=">=</option> 
    <option Greater=">">></option>
    <option Smaller="<"><</option>
    
  </select>
  <br> <br> <label for="attribute3">Choose the order:</label> <br> <br>
  <select  name="attribute3">
    <option ASC="ASC">ASC</option> 
    <option DESC="DESC">DESC</option>
    
  </select>
  <br> <br> <textarea name ="text" rows = "3" cols = "20" placeholder="type the value here"></textarea><br>

  <button type="send"> GO</button> <br>
  

</form>
</div>


<?php
include "config.php";
if($_POST){
  $attribute = $_POST["attribute"];
  $attribute2 = $_POST["attribute2"];
  $attribute3 = $_POST["attribute3"];
  $text = $_POST["text"];

  if($attribute2 == ">"){
    $sql_statement = "SELECT *
                      FROM (SELECT DISTINCT ttp.pid ,ttp.likes,ttp.dislikes,ttp.text,ttp.picture_URL ,ttp.video_URL, M.uid ,M.tid 
                          FROM (SELECT tp.pid ,tp.likes,tp.dislikes,tp.text,tp.picture_URL ,VP.video_URL 
                                FROM (SELECT P.pid ,P.likes,P.dislikes,P.text,PP.picture_URL 
                                     FROM post P 
                                      LEFT JOIN picture_post PP ON P.pid = PP.pid) AS tp 
                                LEFT JOIN video_post VP ON tp.pid = VP.pid)AS ttp 
                          LEFT JOIN makes M ON ttp.pid ) AS TTP    

                        WHERE TTP.$attribute > '$text'
                        ORDER BY TTP.$attribute $attribute3";

    $result = mysqli_query($db, $sql_statement);
    
    echo "<table> <tr> <th> pid  </th> <th> likes </th> <th> dislikes </th> <th> text </th> <th> picture_URL </th> <th>  video_URL </th> <th> uid <th>  tid </th> </tr>";
    while($row = mysqli_fetch_assoc($result))
    {
    $pid = $row['pid'];
    $likes = $row['likes'];
    $dislikes = $row['dislikes'];
    $text = $row['text'];
    $uid = $row['uid'];
    $tid = $row['tid'];
    $picture_url = $row['picture_URL'];
    $video_url =$row['video_URL'];
    echo "<tr>" . "<th>" . $pid . "</th>" . "<th>". $likes . "</th>" . "<th>" . $dislikes . "</th>" ."<th>" . $text . "</th>" ."<th>" . $picture_url . "</th>" ."<th>" . $video_url . "</th>" . "<th>" . $uid . "</th>". "<th>" . $tid . "</th>" ."</tr>";
    }
    echo "</table>";
  }

  if($attribute2 == "="){
    $sql_statement = "SELECT *
    FROM (SELECT DISTINCT ttp.pid ,ttp.likes,ttp.dislikes,ttp.text,ttp.picture_URL ,ttp.video_URL, M.uid ,M.tid 
        FROM (SELECT tp.pid ,tp.likes,tp.dislikes,tp.text,tp.picture_URL ,VP.video_URL 
              FROM (SELECT P.pid ,P.likes,P.dislikes,P.text,PP.picture_URL 
                   FROM post P 
                    LEFT JOIN picture_post PP ON P.pid = PP.pid) AS tp 
              LEFT JOIN video_post VP ON tp.pid = VP.pid)AS ttp 
        LEFT JOIN makes M ON ttp.pid = M.pid ) AS TTP    

      WHERE TTP.$attribute = '$text'
      ORDER BY TTP.$attribute $attribute3";

    $result2 = mysqli_query($db, $sql_statement);

    
    echo "<table> <tr> <th> pid  </th> <th> likes </th> <th> dislikes </th> <th> text </th> <th> picture_URL </th> <th>  video_URL </th> <th> uid <th>  tid </th> </tr>";
    while($row = mysqli_fetch_assoc($result2))
    {
      $pid = $row['pid'];
      $likes = $row['likes'];
      $dislikes = $row['dislikes'];
      $text = $row['text'];
      $uid = $row['uid'];
      $tid = $row['tid'];
      $picture_url = $row['picture_URL'];
      $video_url =$row['video_URL'];
      echo "<tr>" . "<th>" . $pid . "</th>" . "<th>". $likes . "</th>" . "<th>" . $dislikes . "</th>" ."<th>" . $text . "</th>" ."<th>" . $picture_url . "</th>" ."<th>" . $video_url . "</th>" . "<th>" . $uid . "</th>". "<th>" . $tid . "</th>" ."</tr>";
      }
      echo "</table>";
  }


  if($attribute2 == "<"){
    $sql_statement = "SELECT *
    FROM (SELECT DISTINCT ttp.pid ,ttp.likes,ttp.dislikes,ttp.text,ttp.picture_URL ,ttp.video_URL, M.uid ,M.tid 
        FROM (SELECT tp.pid ,tp.likes,tp.dislikes,tp.text,tp.picture_URL ,VP.video_URL 
              FROM (SELECT P.pid ,P.likes,P.dislikes,P.text,PP.picture_URL 
                   FROM post P 
                    LEFT JOIN picture_post PP ON P.pid = PP.pid) AS tp 
              LEFT JOIN video_post VP ON tp.pid = VP.pid)AS ttp 
        LEFT JOIN makes M ON ttp.pid ) AS TTP    

      WHERE TTP.$attribute < '$text'
      ORDER BY TTP.$attribute $attribute3";

    $result2 = mysqli_query($db, $sql_statement);

    
    echo "<table> <tr> <th> pid  </th> <th> likes </th> <th> dislikes </th> <th> text </th> <th> picture_URL </th> <th>  video_URL </th> <th> uid <th>  tid </th> </tr>";
    while($row = mysqli_fetch_assoc($result2))
    {
      $pid = $row['pid'];
      $likes = $row['likes'];
      $dislikes = $row['dislikes'];
      $text = $row['text'];
      $uid = $row['uid'];
      $tid = $row['tid'];
      $picture_url = $row['picture_URL'];
      $video_url =$row['video_URL'];
      echo "<tr>" . "<th>" . $pid . "</th>" . "<th>". $likes . "</th>" . "<th>" . $dislikes . "</th>" ."<th>" . $text . "</th>" ."<th>" . $picture_url . "</th>" ."<th>" . $video_url . "</th>" . "<th>" . $uid . "</th>". "<th>" . $tid . "</th>" ."</tr>";
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