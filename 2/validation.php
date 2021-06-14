<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    

    <?php

    include "config.php";




    $password = $_POST['password'];

    $email = $_POST['email'];



    $con = mysqli_connect('localhost', 'root','','project_db1');

    mysqli_select_db($con, 'project_db1');

    $sql_passwordSame = "SELECT * FROM users WHERE Email = '$email' && Password = '$password'";

    $result1 = mysqli_query($con, $sql_passwordSame);

    $num = mysqli_num_rows($result1);
    
    
    

    $sql_urlInfo = "SELECT Info,Picture_profile_url, Username FROM users WHERE EMAIL = '$email'";

    $result2 = mysqli_query($db, $sql_urlInfo);

    $user_row = mysqli_fetch_assoc($result2);

    $info = $user_row['Info'];

    $url = $user_row['Picture_profile_url'];

    $name = $user_row['Username'];



    if($num == 1){
        echo "<div class=\"val\"><h1> WELCOME BACK <br><br>" . $name .   "</h1><br>";
        echo"<img style =\"width:40%;\" class=\"val_picture\" src=$url alt=\"NO VALID PICTURE \"> <br>";
        echo ("<h1>" . $info  . "</h1><hr>");
        
        $uid_row = mysqli_fetch_assoc($result1);
        $uid = $uid_row['uid'] ;
    
        echo "<br> <form action=\"threadList.php\" method=\"POST\">    
        <input type=\"hidden\" name=\"uid\" value= $uid \">
        <input type=\"hidden\" name=\"tname\" value= \"nan\" > 
        <button type=\"send\" class=\"button\" > <h1 >CONTINUE</h1> </button>  <br>
        </form> </div>";
    }
    else{

        echo "Password is incorrect" . "<br>";
        echo " <a href=\"./login.php\"> Go back to Login Screen </a>" ;
        header ('location: login.php');
    }
    
    ?>
    
    </footer>
</body>
</html>