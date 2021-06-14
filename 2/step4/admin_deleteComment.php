<?php 

include "config.php";

if (isset($_POST['ids'])){

$selection_id = $_POST['ids'];

$sql_statement2 = "UPDATE comment SET text = '[Redacted]' WHERE cid= $selection_id;";

$result2 = mysqli_query($db, $sql_statement2);


header ("Location: adminDeleteComment.php");

}

else
{

	echo "The form is not set.";
	echo " <a href=\"./adminDeletePost.php\"> Go back to Delete Users Panel </a>" ;

}

?>