<!DOCTYPE html>
<html>
<head>

  <meta charset="UTF-8">
  <link rel="stylesheet" href="style.css">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Admin Insert Post Panel</title>

  
<style>
input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>
</head>
<body>

<div align="center">
<b>Welcome to our ADMIN INSERT COMMENT PANEL</b>
<br>
<br>
<br>
Adding to our COMMENTS database as ADMINS
<br><br>

<?php
include "comment.php";
?>
<form action="admin_insertComment.php" method="POST">
<br><br><br><br>
  <input type="number" name="uid" placeholder="type the uid "> <br>
  
  <textarea name ="text" rows = "5" cols = "100" placeholder="type your text here here"></textarea><br><br>
  <input type="number" name="pid" placeholder="type the pid "> <br>
  
  <label for="under_comment ">Is this comment(cid) a comment to another comment(cid2)? :</label>
  <select  name="option">
  <option value="no"> No</option>
  <option value="yes">Yes </option>

</select>



  <input type="number" name="cid2" placeholder="type the cid2 of the comment"> <br>
  

	<button>SEND</button>

  
</form>
</div>
<footer> 
        <a href="./index.php"> Go to First Page </a> <br> 
    </footer> 
</body>
</html>