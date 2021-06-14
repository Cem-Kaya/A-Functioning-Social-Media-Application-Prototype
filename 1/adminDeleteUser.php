<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Users </title>
</head>
<body>
<?php

include "config.php";

include "users.php";

?>
<?php

$sql_command ="SELECT uid FROM users";

?>

<form action="admin_deleteUsers.php" method="POST">

<select name = "ids">

<?php

$sql_command ="SELECT uid FROM users";

$myresult = mysqli_query($db, $sql_command);

while($id_rows = mysqli_fetch_assoc($myresult)){
	$uid = $id_rows['uid'];

	echo "<option value=$uid>". $uid. "</option>";

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

