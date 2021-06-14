<?php 

include "config.php";

if (isset($_POST['ids'])){

$selection_id = $_POST['ids'];

$sql_statement2 = "DELETE FROM makes WHERE pid = $selection_id";

$result2 = mysqli_query($db, $sql_statement2);

$sql_statement3 = "DELETE FROM picture_post WHERE pid = $selection_id";

$result3 = mysqli_query($db, $sql_statement3);

$sql_statement4 = "DELETE FROM video_post WHERE pid = $selection_id";

$result4 = mysqli_query($db, $sql_statement4);

$sql_statement = "DELETE FROM post WHERE pid = $selection_id";

$result = mysqli_query($db, $sql_statement);



header ("Location: adminDeletePost.php");

}

else
{

	echo "The form is not set.";
	echo " <a href=\"./adminDeletePost.php\"> Go back to Delete Users Panel </a>" ;

}

?>