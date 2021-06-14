<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Thread Creates</title>
</head>
<body>
    
<?php 

include "config.php";

if (isset($_POST['ids'])){

$selection_id = $_POST['ids'];

$sql_statement = "DELETE FROM threadCreates WHERE tid = $selection_id";

$result = mysqli_query($db, $sql_statement);

header ("Location: adminDeleteThreadCreates.php");

}

else
{

	echo "The form is not set.";
	echo " <a href=\"./adminDeleteThreadCreates.php\"> Go back to Delete Thread Panel </a>" ;

}

?>

    <footer> 
        <a href="./index.php"> Go to First Page </a> <br> 
    </footer>
</body>
</html>


