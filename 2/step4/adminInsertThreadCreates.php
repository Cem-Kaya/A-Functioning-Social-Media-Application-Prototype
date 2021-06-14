<!DOCTYPE html>
<html>
<head>

  <meta charset="UTF-8">
  <link rel="stylesheet" href="style.css">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin Insert Thread Panel</title>
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
<b>Welcome to our ADMIN THREAD INSERT PANEL</b>
<br>
<br>
<br>
Adding to our thread database as ADMINS
<br><br>

<?php
include "threadcreates.php";
?>
<form action="admin_insertThreadCreates.php" method="POST">
  <input type="text" name="tname" placeholder="type the thread's name"><br>
  <input type="number" name="uid" placeholder="type the user responsible for the thread"><br>
	<button>SEND</button>
</form>
</div>
<footer> 
        <a href="./index.php"> Go to First Page </a> <br> 
    </footer>

</body>
</html>