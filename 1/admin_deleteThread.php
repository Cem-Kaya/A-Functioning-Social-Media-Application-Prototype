<?php 

include "config.php";

if (isset($_POST['ids'])){

$selection_id = $_POST['ids'];

$sql_statement = "DELETE FROM threadcreates WHERE tid = $selection_id";

$result = mysqli_query($db, $sql_statement);

header ("Location: adminDeleteThreadCreates.php");

}

else
{

	echo "The form is not set.";
	echo " <a href=\"./adminDeleteThreadCreates.php\"> Go back to Delete Users Panel </a>" ;

}

?>