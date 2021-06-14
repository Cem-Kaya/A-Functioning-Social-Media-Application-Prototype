<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Insert Post</title>
</head>
<body>

<?php

include "config.php";

$pid = $_POST['pid'];

$likes = $_POST['likes'];

$dislikes = $_POST['dislikes'];

$text = $_POST['text'];

$url = $_POST['url'];

$uid = $_POST['uid'];

$tid = $_POST['tid'];

$type = $_POST['post_type'];

echo $pid . "<br>". $likes . "<br>" . $dislikes . "<br>". $text . "<br>" . $url . "<br>" ;

$sql_statement = "INSERT INTO post(pid, likes, dislikes, text)
					VALUES ('$pid', '$likes', '$dislikes',  '$text')";


$sql_forMakes = "SELECT * FROM post";  
$result_forMakes = mysqli_query($db,$sql_forMakes);
#$arr_forMakes1 = mysqli_fetch_assoc($result_forMakes);

$result = mysqli_query($db, $sql_statement);

$sql_forMakes2 = "SELECT * FROM post";  
$result_forMakes2 = mysqli_query($db,$sql_forMakes2);
#$arr_forMakes2 = mysqli_fetch_assoc($result_forMakes2);
# find new pid 
$the_pid=-1 ;
while($pid_rows = mysqli_fetch_assoc($result_forMakes2)){
	$pidW = $pid_rows['pid'];
    $temp = false;
    while($pid_rows2 = mysqli_fetch_assoc($result_forMakes)){
        $pidW2 = $pid_rows2['pid'];
    
        if($pidW == $pidW2){
            $temp = true;
            break;
        }
    
    }

    if(!$temp){
        $the_pid = $pidW;;
        break;
    }

}

$sql_statement2 = "INSERT INTO makes(pid, tid, uid)
					VALUES ('$the_pid ', '$tid', '$uid')";

$result2 = mysqli_query($db, $sql_statement2);

if($type == "picture"){
    $sql_statement3 = "INSERT INTO picture_post(pid, picture_URL)
					VALUES ('$the_pid', '$url')";

    $result3 = mysqli_query($db, $sql_statement3);
}
if($type == "video"){
    $sql_statement4 = "INSERT INTO video_post(pid, video_URL)
                    VALUES ('$the_pid', '$url')";

    $result4 = mysqli_query($db, $sql_statement4);    
}


header ("Location: adminInsertPost.php");

?>
    <footer> 
        <a href="./index.php"> Go to First Page </a> <br> 
    </footer>
</body>
</html>


