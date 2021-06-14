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
<b>Welcome to our ADMIN INSERT POST PANEL</b>
<br>
<br>
<br>
Adding to our posts database as ADMINS
<br><br>

<?php
include "post.php";
?>
<form action="admin_InsertPost.php" method="POST">
<br><br><br><br><br><input type="number" name="uid" placeholder="type the uid (for makes table)"> <br>
  <input type="number" name="tid" placeholder="type the tid (for makes table)"> <br> 
  <input type="number" name="likes" placeholder="type the number of likes"> <br>
  <input type="number" name="dislikes" placeholder="type the number of dislikes"> <br>
  <textarea name ="text" rows = "5" cols = "100" placeholder="type the desired user's info here"></textarea><br><br>
  
  
  <label for="post type ">Choose a post:</label>
  <select  name="post_type">
  <option value="normal">normal</option>
  <option value="picture">picture</option>
  <option value="video">video </option>
</select>



  <input type="text" name="url" placeholder="type picture_url or video_url (Void if normal)"> <br>
  

	<button>SEND</button>

  
</form>
</div>
<footer> 
        <a href="./index.php"> Go to First Page </a> <br> 
    </footer>
</body>
</html>