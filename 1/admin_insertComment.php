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

$uid = $_POST['uid'];


$text = $_POST['text'];

$pid = $_POST['pid'];

$option = $_POST['option'];

$cid2 = $_POST['cid2'];

$wdate = date('Y/m/d');

#echo $pid . "<br>". $cid . "<br>" . $uid . "<br>". $text . "<br>" . $cid2 . "<br>" ;




$sql_forMakes = "SELECT * FROM comment";  
$result_forMakes = mysqli_query($db,$sql_forMakes);
#$arr_forMakes1 = mysqli_fetch_assoc($result_forMakes);

$sql_statement = "INSERT INTO comment(text)
					VALUES ('$text')";
$result = mysqli_query($db, $sql_statement);

$sql_forMakes2 = "SELECT * FROM comment";  
$result_forMakes2 = mysqli_query($db,$sql_forMakes2);
#$arr_forMakes2 = mysqli_fetch_assoc($result_forMakes2);
# find new pid 
$the_cid=-1 ;
while($cid_rows = mysqli_fetch_assoc($result_forMakes2)){
	$cidW = $cid_rows['cid'];
    $temp = false;
    while($cid_rows2 = mysqli_fetch_assoc($result_forMakes)){
        $cidW2 = $cid_rows2['cid'];
    
        if($cidW == $cidW2){
            $temp = true;
            break;
        }
    
    }

    if(!$temp){
        $the_cid = $cidW;;
        break;
    }

}

$sql_statement2 = "INSERT INTO writes(cid, pid, uid, wdate)
					VALUES ('$the_cid ','$pid' , '$uid', '$wdate')";

$result2 = mysqli_query($db, $sql_statement2);

if($option == "yes"){
    $sql_statement3 = "INSERT INTO reply_under(cid1, cid2)
					VALUES ('$the_cid', '$cid2')";

    $result3 = mysqli_query($db, $sql_statement3);
}



header ("Location: adminInsertComment.php");

?>
    <footer> 
        <a href="./index.php"> Go to First Page </a> <br> 
    </footer>
</body>
</html>