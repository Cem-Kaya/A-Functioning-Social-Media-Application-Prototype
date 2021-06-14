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
    
    $pid = $_POST['pid'];

    $uid = $_POST['uid'];

    $type = $_POST['type'];
    

    $sql_statement5 = "SELECT * FROM (SELECT DISTINCT ttp.pid ,ttp.likes,ttp.dislikes,ttp.text,ttp.picture_URL ,ttp.video_URL, M.uid ,M.tid 
    FROM (SELECT tp.pid ,tp.likes,tp.dislikes,tp.text,tp.picture_URL ,VP.video_URL 
          FROM (SELECT P.pid ,P.likes,P.dislikes,P.text,PP.picture_URL 
               FROM post P 
                LEFT JOIN picture_post PP ON P.pid = PP.pid) AS tp 
          LEFT JOIN video_post VP ON tp.pid = VP.pid)AS ttp 
    LEFT JOIN makes M ON ttp.pid = M.pid) AS TTP   
    WHERE TTP.pid='$pid' ";
    #ORDER BY TTP.likes ";
    
    $result = mysqli_query($db, $sql_statement5) ;


    $row = mysqli_fetch_assoc($result) ;
    
    $likes = $row['likes'];
    $dislikes = $row['dislikes'];
    $text = $row['text'];
    $picture = $row['picture_URL'];
    $video = $row['video_URL'];
    $uidpost = $row['uid'] ;
    
    $tid = $row['tid'] ;
    
    $pid = $row['pid'] ;






    if( $picture != null){
        echo (
        "<div class=\"post1\"  id=\"PPP\"  > <br>
        <img class=\"postpic\" style=\"width: 40%;\" src=\"$picture\"> <br> <br>
        <form action=\"realpost.php\" method=\"POST\">
        <input type=\"hidden\" name=\"uid\" value= $uidpost \">            
        <input type=\"hidden\" name=\"pid\" value= $pid \"> 
        <input type=\"hidden\" name=\"type\" value= \"nan\"> 
        <input type=\"hidden\" name=\"cidd\" value=  \"nan\"> 

        <button type=\"send\" >  <h3> ".$text."</h3> <br> </button> 
        </form>
        
        <form action=\"postlist.php\" method=\"POST\">                
        <input type=\"hidden\" name=\"uid\" value= $uidpost \">
        <input type=\"hidden\" name=\"tid\" value= $tid \"> 
        <input type=\"hidden\" name=\"pid\" value= $pid \"> 
        </form>
        <form action=\"postlist.php\" method=\"POST\">
        <input type=\"hidden\" name=\"uid\" value= $uidpost \">
        <input type=\"hidden\" name=\"tid\" value= $tid \"> 
        <input type=\"hidden\" name=\"pid\" value= $pid \"> 
        <input type=\"hidden\" name=\"type\" value= \"likes\" > 
        <button type=\"send\"  >  <h2> Likes: ".$likes."<h2> </button> 
        </form>
        <form action=\"postlist.php\" method=\"POST\">
        <input type=\"hidden\" name=\"uid\" value= $uidpost \">
        <input type=\"hidden\" name=\"tid\" value= $tid \"> 
        <input type=\"hidden\" name=\"pid\" value= $pid \"> 
        <input type=\"hidden\" name=\"type\" value= \"dislikes\" > 
        <form action=\"postlist.php\" method=\"POST\">
        <button type=\"send\"  ><h3> Dislikes: ".$dislikes."<h3> </button> <br>
        
        </form>
        </div>
        ");
    
    }
    else if($video != null)
    {
        echo(
        " <div class=\"post1\"  id=\"PPP\"  > <br>
        <iframe width=\"16%\" height=\"9%\" src='$video' title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe> <br> <br>
        <form action=\"realpost.php\" method=\"POST\">
        <input type=\"hidden\" name=\"uid\" value= $uidpost \">            
        <input type=\"hidden\" name=\"pid\" value= $pid \"> 
        <input type=\"hidden\" name=\"type\" value= \"nan\"> 
        <input type=\"hidden\" name=\"cidd\" value=  \"nan\"> 
        <button type=\"send\" >  <h3> ".$text."</h3> <br> </button> 
        </form>

        <form action=\"postlist.php\" method=\"POST\">                
        <input type=\"hidden\" name=\"uid\" value= $uidpost \">
        <input type=\"hidden\" name=\"tid\" value= $tid \"> 
        <input type=\"hidden\" name=\"pid\" value= $pid \"> 
        </form>
        <form action=\"postlist.php\" method=\"POST\">
        <input type=\"hidden\" name=\"uid\" value= $uidpost \">
        <input type=\"hidden\" name=\"tid\" value= $tid \"> 
        <input type=\"hidden\" name=\"pid\" value= $pid \"> 
        <input type=\"hidden\" name=\"type\" value= \"likes\" > 
        <button type=\"send\"  >  <h2> Likes: ".$likes."<h2> </button> 
        </form>
        <form action=\"postlist.php\" method=\"POST\">
        <input type=\"hidden\" name=\"uid\" value= $uidpost \">
        <input type=\"hidden\" name=\"tid\" value= $tid \"> 
        <input type=\"hidden\" name=\"pid\" value= $pid \"> 
        <input type=\"hidden\" name=\"type\" value= \"dislikes\" > 
        <form action=\"postlist.php\" method=\"POST\">
        <button type=\"send\"  ><h3> Dislikes: ".$dislikes."<h3> </button> <br>
        
        </form>
        </div>");
    }
    else
    echo (
        "<div class=\"post1\"  id=\"PPP\"  > <br>
        <form action=\"realpost.php\" method=\"POST\">
        <input type=\"hidden\" name=\"uid\" value= $uidpost \">            
        <input type=\"hidden\" name=\"pid\" value= $pid \"> 
        <input type=\"hidden\" name=\"type\" value= \"nan\"> 
        <input type=\"hidden\" name=\"cidd\" value=  \"nan\"> 
        <button type=\"send\" >  <h3> ".$text."</h3> <br> </button> 
        </form>
   
        <form action=\"postlist.php\" method=\"POST\">                
        <input type=\"hidden\" name=\"uid\" value= $uidpost \">
        <input type=\"hidden\" name=\"tid\" value= $tid \"> 
        <input type=\"hidden\" name=\"pid\" value= $pid \"> 
        </form>
        <form action=\"postlist.php\" method=\"POST\">
        <input type=\"hidden\" name=\"uid\" value= $uidpost \">
        <input type=\"hidden\" name=\"tid\" value= $tid \"> 
        <input type=\"hidden\" name=\"pid\" value= $pid \"> 
        <input type=\"hidden\" name=\"type\" value= \"likes\" > 
        <button type=\"send\"  >  <h2> Likes: ".$likes."<h2> </button> 
        </form>
        <form action=\"postlist.php\" method=\"POST\">
        <input type=\"hidden\" name=\"uid\" value= $uidpost \">
        <input type=\"hidden\" name=\"tid\" value= $tid \"> 
        <input type=\"hidden\" name=\"pid\" value= $pid \"> 
        <input type=\"hidden\" name=\"type\" value= \"dislikes\" > 
        <form action=\"postlist.php\" method=\"POST\">
        <button type=\"send\"  ><h3> Dislikes: ".$dislikes."<h3> </button> <br>
        
        </form>
        </div>"
    );  








    echo("
        <div>
        <form action=\"realpost.php\" method=\"POST\" >
            <textarea name =\"text\" rows = \"1\" cols = \"100\" placeholder=\"type the text\"></textarea><br>                   
            <input type=\"hidden\" name=\"uid\" value= $uid \">     
            <input type=\"hidden\" name=\"pid\" value=  $pid\"> 
            <input type=\"hidden\" name=\"cidd\" value= \"topost\"> 
            <input type=\"hidden\" name=\"type\" value=\"new\"> 
            <button type=\"send\" class=\"comment_under\" > comment </button> <br>
        </form> 
        </div>"
    );
    
    $uid = $_POST['uid'];
    
    if($type == "new"){

        $uid = $_POST['uid'];

        $cid2 = $_POST['cidd'];


        $text = $_POST['text'];


        $wdate = date('Y/m/d');

        #echo $pid . "<br>". $cid . "<br>" . $uid . "<br>". $text . "<br>" . $cid2 . "<br>" ;

        if($cid2 !="nan"){
            $option = "yes";
        }else{
            $option = "no";
        }


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

        if($cid2 != "nan"){
            $sql_statement3 = "INSERT INTO reply_under(cid1, cid2)
                            VALUES ('$the_cid', '$cid2')";

            $result3 = mysqli_query($db, $sql_statement3);
        }



    }else if( $type == "del") {
        $uid = $_POST['uid'];
        
        $selection_id = $_POST['cidd'];
        
        $sql_statement222 = " SELECT *
                              FROM writes m
                              WHERE m.cid = '$selection_id' ";
        
        $result222 = mysqli_query($db, $sql_statement222);
        
        $ro = mysqli_fetch_assoc($result222 );
        $uid = $_POST['uid'];
        if($ro['uid'] == $uid){
            echo($ro['uid']);
            echo($uid);
            $sql_statement22 = "UPDATE comment SET text = '[Redacted]' WHERE cid= '$selection_id'";
            
            $result22 = mysqli_query($db, $sql_statement22);
    
        }
        else {
            echo("This is not your comment");
        }
    
    }





    $sql_statement = " SELECT C.cid, C.text, m.uid,  m.pid
                        FROM (  SELECT * 
                                FROM comment W 
                                LEFT JOIN reply_under R 
                                ON R.cid1=W.cid WHERE R.cid2 IS NULL) AS C 
                            LEFT JOIN writes m		
                            ON C.cid = m.cid
                            WHERE m.pid = '$pid' ";
    

    $result = mysqli_query($db, $sql_statement);

    
    function com($cd , $pad , $BB , $pd, $ud ){
        $sql_statement2 = " SELECT C.cid, C.text, m.uid,  m.pid
                FROM (SELECT * 
                    FROM comment W 
                    LEFT JOIN reply_under R 
                        ON R.cid1 = W.cid WHERE R.cid2 IS NOT NULL ) AS C 
                        LEFT JOIN writes m
                            ON C.cid = m.cid
                            WHERE C.cid2 =  '$cd'";
                            
        $res= mysqli_query($BB, $sql_statement2);
        
        while($row = mysqli_fetch_assoc($res ) ){
            $cd2 = $row['cid'];
            $text2 = $row['text'];
            echo (
            "<div class=\"commentdiv\" style=\"margin-left:".$pad."%;\"> ".$text2." <br> "
                        
            );
            echo(
                "
                <form action=\"realpost.php\" method=\"POST\" >                 
                <input type=\"hidden\" name=\"uid\" value= $ud \">     
                <input type=\"hidden\" name=\"pid\" value=  $pd\"> 
                <input type=\"hidden\" name=\"cidd\" value=  $cd2\"> 
                <input type=\"hidden\" name=\"type\" value=\"del\"> 
                <button type=\"send\" class=\"delete\" > delete </button> <hr>
            </form> 
                    <form action=\"realpost.php\" method=\"POST\" >
                    <textarea name =\"text\" rows = \"1\" cols = \"100\" placeholder=\"type the text\"></textarea><br>                   
                    <input type=\"hidden\" name=\"uid\" value= $ud \">     
                    <input type=\"hidden\" name=\"pid\" value=  $pd\"> 
                    <input type=\"hidden\" name=\"cidd\" value=  $cd2\"> 
                    <input type=\"hidden\" name=\"type\" value=\"new\"> 
                    <button type=\"send\" class=\"comment_under\" > comment </button> 
                </form> 
               
                </div>"
                );
            com($cd2, $pad +7.5, $BB ,$pd ,$ud );
            
        }
    }
    
    while($row = mysqli_fetch_assoc($result))
    {
        $cid = $row['cid'];
        $text = $row['text'];
        echo(
            
            "<div class=\"commentdiv\" > $text "
        );

        echo(
            "
            <form action=\"realpost.php\" method=\"POST\" >                 
                    <input type=\"hidden\" name=\"uid\" value= $uid \">     
                    <input type=\"hidden\" name=\"pid\" value=  $pid\"> 
                    <input type=\"hidden\" name=\"cidd\" value=  $cid\"> 
                    <input type=\"hidden\" name=\"type\" value=\"del\"> 
                    <button type=\"send\" class=\"delete\" > delete </button> <hr>
            </form> 
            <form action=\"realpost.php\" method=\"POST\" >
                <textarea name =\"text\" rows = \"1\" cols = \"100\" placeholder=\"type the text\"></textarea><br>                   
                <input type=\"hidden\" name=\"uid\" value= $uid \">     
                <input type=\"hidden\" name=\"pid\" value=  $pid\"> 
                <input type=\"hidden\" name=\"cidd\" value=  $cid\"> 
                <input type=\"hidden\" name=\"type\" value=\"new\"> 
                <button type=\"send\" class=\"comment_under\" > comment </button> <br>
            </form> 
                
            </div>"
            );
        $pad=2.5;
        com($cid, $pad +7.5, $db, $pid , $uid );
       
    }


    echo("<form id=\"foot\" action=\"threadList.php\" method=\"POST\">    
                <input type=\"hidden\" name=\"uid\" value= $uid \">
                <input type=\"hidden\" name=\"tname\" value= \"nan\" > 
                <button type=\"send\"  class=\"button\" > <h1 >To Start </h1> </button>  <br>
            </form>");
        
    
    
    ?>
</body>
</html>