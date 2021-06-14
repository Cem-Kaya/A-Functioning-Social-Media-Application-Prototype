<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title> Admin Delete Thread Creates</title>
</head>
<body>
<?php

include "config.php";

include "threadcreates.php";



?>
<?php

$sql_command ="SELECT tid FROM thread";

?>

<form action="admin_deleteThreadCreates.php" method="POST">

<select name = "ids">

<?php

$sql_command ="SELECT tid FROM threadcreates";

$myresult = mysqli_query($db, $sql_command);

while($id_rows = mysqli_fetch_assoc($myresult)){
	$tid = $id_rows['tid'];

	echo "<option value=$tid>". $tid. "</option>";

}

?>
</select>
<button>DELETE</button>
</form>	

<footer> 
    <a href="./index.php"> Go to First Page </a> <br> 
</footer>

</body>
</html>
