<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="thread_body">
    <?php
        include "config.php" ;
        

        $uid= $_POST['uid'] ;
        

        echo(
        "<div =\"thread_add\>
            ADD NEW THREAD ! 
            <form action=\"threadList.php\" method=\"POST\" >
                <input type=\"text\" name=\"tname\" placeholder=\"Enter Thread Name\"><br>
                <input type=\"hidden\" name=\"uid\" value= $uid \">
                <button type=\"send\" class=\"threadInsert_button\" > INSERT THREAD </button> <br>
            </form>
        </div>"
        );
      
        
        
	if($_POST['tname'] != "nan" ){
        if($_POST['tname'] != ""){
        $tname = $_POST['tname'];

        $tdate = date("y/m/d");

        

        $sql_statement11 = "INSERT INTO threadcreates(tname, tdate, uid)
                            VALUES ('$tname', '$tdate','$uid')";

        $result11 = mysqli_query($db, $sql_statement11);
        }
        else{
            echo("NEED A NAME FOR THE THREAD!");
        }

    }

        $sql_statement = "SELECT * FROM threadcreates" ;

        $result = mysqli_query($db, $sql_statement) ;


        while( $row = mysqli_fetch_assoc($result) )
        {

        $tname = $row['tname'] ;

        $tid = $row['tid'] ;
       
        echo (
            "<div class=\"thread\" > 
            <form action=\"postlist.php\" method=\"POST\">
            <input type=\"hidden\" name=\"type\" value= \"nan\">
            <input type=\"hidden\" name=\"uid\" value=\" $uid \">
            <input type=\"hidden\" name=\"tid\" value=\" $tid \"> 
            <input type=\"hidden\" name=\"pid\" value= \"nan\" > 
            <button type=\"send\" class=\"thread_button\" ><span><h1 class =\"thread_h1\"> ".$tname."</h1> </span></button> <br>
            </form>
            </div>"
        );
        
    }
  
        
    

    ?>

    <div id="logout">
        <form action="login.php" method="POST">
            <button class="delete"  type="send"> <h2>Log Out </h2></button>
        </form>
</div>

    
</body>
</html>