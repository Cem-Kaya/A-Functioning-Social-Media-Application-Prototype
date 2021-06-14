<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="post_body">


<?php
        include "config.php" ;
        $uid = $_POST['uid'];
        $tid = $_POST['tid'];
        $pid = $_POST['pid'];
        if($_POST['type']!="nan" ){
            if($_POST['pid'] == "nan"){
                $pid= '';
            }
            if($_POST['type']){
                if($_POST['type'] == "likes" ){
                    $sql_statementL = "UPDATE post SET likes =likes + 1 WHERE pid='$pid'";
                    $result1 = mysqli_query($db, $sql_statementL) ;
                }
                if($_POST['type'] == "dislikes" ){
                    $sql_statementL = "UPDATE post SET dislikes =dislikes + 1 WHERE pid='$pid'   ";
                    $result2 = mysqli_query($db, $sql_statementL) ;
                }
                if($_POST['type'] == "del"){


                    $sqlstatement666 = "SELECT * FROM makes WHERE pid = '$pid'";

                    $result666 = mysqli_query($db, $sqlstatement666);
                    
                    $ro = mysqli_fetch_assoc($result666);

                    if($ro['uid'] == $uid){

                        $selection_id = $_POST['pid'];

                        $sql_statement222 = "DELETE FROM makes WHERE pid = $selection_id";

                        $result222 = mysqli_query($db, $sql_statement222);

                        $sql_statement333 = "DELETE FROM picture_post WHERE pid = $selection_id";

                        $result333 = mysqli_query($db, $sql_statement333);

                        $sql_statement444 = "DELETE FROM video_post WHERE pid = $selection_id";

                        $result444 = mysqli_query($db, $sql_statement444);

                        $sql_statement555 = "DELETE FROM post WHERE pid = $selection_id";

                        $result555 = mysqli_query($db, $sql_statement555);
                    } else{
                        echo("YOU ARE NOT GANDALF");
                    }  
                }
            }
        }


        
        
        
        





        echo(
            "<div>
                ADD NEW POST ! 
                <form action=\"postlist.php\" method=\"POST\" >
                <textarea name =\"text\" rows = \"5\" cols = \"100\" placeholder=\"type the text\"></textarea><br>
                <label for=\"post_type \">Choose a post:</label>
                <select  name=\"post_type\">
                    <option value=\"normal\">normal</option>
                    <option value=\"picture\">picture</option>
                    <option value=\"video\">video </option>
                </select>
                <input type=\"text\" name=\"url\" placeholder=\"type picture_url or video_url (Void if normal)\"> <br>
                <input type=\"hidden\" name=\"uid\" value= $uid \">
                <input type=\"hidden\" name=\"tid\" value= $tid \"> 
                <input type=\"hidden\" name=\"pid\" value=  \"nan\"> 
                <input type=\"hidden\" name=\"type\" value= \"new\" > 
                <button type=\"send\" class=\"threadInsert_button\" > INSERT Post </button> <br>
            </form>
            </div>" 
            );
          
    
        if($_POST['type']=="new" ){
            $likes = 0;
            
            $dislikes = 0;
            
            $text = $_POST['text'];
            
            $url = $_POST['url'];
            
            $pType = $_POST['post_type'];
            
            
            $sql_statement11 = "INSERT INTO post(likes, dislikes, text)
                                VALUES ('$likes', '$dislikes',  '$text')";

            

            

            $sql_forMakes = "SELECT * FROM post";  
            $result_forMakes = mysqli_query($db,$sql_forMakes);

            $result11 = mysqli_query($db, $sql_statement11);

            $sql_forMakes2 = "SELECT * FROM post";  
            $result_forMakes2 = mysqli_query($db,$sql_forMakes2);
            
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
                    $the_pid = $pidW;
                    break;
                }
            
            }
            
          

            $sql_statement2 = "INSERT INTO makes(pid, tid, uid)
					VALUES ('$the_pid ', '$tid', '$uid')";

            $result2 = mysqli_query($db, $sql_statement2);

            if($pType == "picture"){
                 $sql_statement3 = "INSERT INTO picture_post(pid, picture_URL)
					VALUES ('$the_pid', '$url')";

                 $result3 = mysqli_query($db, $sql_statement3);
            }
            if($pType == "video"){
                $sql_statement4 = "INSERT INTO video_post(pid, video_URL)
                    VALUES ('$the_pid', '$url')";

                $result4 = mysqli_query($db, $sql_statement4);    
            }

            


            
    
        }   





        



        #$sql_statement = "SELECT post.pid , post.likes  , post.dislikes  , post.text  , makes.uid  , makes.tid   FROM post ,makes WHERE  post.pid = makes.pid AND makes.tid='$tid' " ;
        $sql_statement = "SELECT * FROM (SELECT DISTINCT ttp.pid ,ttp.likes,ttp.dislikes,ttp.text,ttp.picture_URL ,ttp.video_URL, M.uid ,M.tid 
        FROM (SELECT tp.pid ,tp.likes,tp.dislikes,tp.text,tp.picture_URL ,VP.video_URL 
              FROM (SELECT P.pid ,P.likes,P.dislikes,P.text,PP.picture_URL 
                   FROM post P 
                    LEFT JOIN picture_post PP ON P.pid = PP.pid) AS tp 
              LEFT JOIN video_post VP ON tp.pid = VP.pid)AS ttp 
        LEFT JOIN makes M ON ttp.pid = M.pid) AS TTP   
        WHERE TTP.tid  ='$tid' "    ;
        #ORDER BY TTP.likes ";
        
        $result = mysqli_query($db, $sql_statement) ;


        while( $row = mysqli_fetch_assoc($result) )
        {
        $likes = $row['likes'];
        $dislikes = $row['dislikes'];
        $text = $row['text'];
        $picture = $row['picture_URL'];
        $video = $row['video_URL'];
        $uidd = $row['uid'] ;
        
        $tid = $row['tid'] ;
        
        $pid = $row['pid'] ;

        if( $picture != null){
            echo (
            "<div class=\"post1\"  id=\"PPP\"  > <br>
            <img class=\"postpic\" style=\"width: 40%;\" src=\"$picture\"> <br> <br>
            <form action=\"realpost.php\" method=\"POST\">
            <input type=\"hidden\" name=\"uid\" value= $uid \">            
            <input type=\"hidden\" name=\"pid\" value= $pid \"> 
            <input type=\"hidden\" name=\"type\" value= \"nan\"> 
            <input type=\"hidden\" name=\"cidd\" value=  \"nan\"> 

            <button type=\"send\" >  <h3> ".$text."</h3> <br> </button> 
            </form>
            
            <form action=\"postlist.php\" method=\"POST\">                
            <input type=\"hidden\" name=\"uid\" value= $uid \">
            <input type=\"hidden\" name=\"tid\" value= $tid \"> 
            <input type=\"hidden\" name=\"pid\" value= $pid \"> 
            </form>
            <form action=\"postlist.php\" method=\"POST\">
            <input type=\"hidden\" name=\"uid\" value= $uid \">
            <input type=\"hidden\" name=\"tid\" value= $tid \"> 
            <input type=\"hidden\" name=\"pid\" value= $pid \"> 
            <input type=\"hidden\" name=\"type\" value= \"likes\" > 
            <button type=\"send\" class=\"like_button\" >  <h2> Likes: ".$likes."<h2> </button> 
            </form>
            <form action=\"postlist.php\" method=\"POST\">
            <input type=\"hidden\" name=\"uid\" value= $uid \">
            <input type=\"hidden\" name=\"tid\" value= $tid \"> 
            <input type=\"hidden\" name=\"pid\" value= $pid \"> 
            <input type=\"hidden\" name=\"type\" value= \"dislikes\" > 
            <form action=\"postlist.php\" method=\"POST\">
            <button type=\"send\"  ><h3> Dislikes: ".$dislikes."<h3> </button> <br>
            
            
            </form>
            </form>


            <form action=\"postlist.php\" method=\"POST\">
            <input type=\"hidden\" name=\"uid\" value= $uid \">
            <input type=\"hidden\" name=\"tid\" value= $tid \"> 
            <input type=\"hidden\" name=\"pid\" value= $pid \"> 
            <input type=\"hidden\" name=\"type\" value= \"del\" > 
            
            <button type=\"send\" class=\"delete\" ><h4> Delete <h4> </button> <br>
            
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
            <input type=\"hidden\" name=\"uid\" value= $uid \">            
            <input type=\"hidden\" name=\"pid\" value= $pid \"> 
            <input type=\"hidden\" name=\"type\" value= \"nan\"> 
            <input type=\"hidden\" name=\"cidd\" value=  \"nan\"> 
            <button type=\"send\"  >  <h3> ".$text."</h3> <br> </button> 
            </form>
    
            <form action=\"postlist.php\" method=\"POST\">                
            <input type=\"hidden\" name=\"uid\" value= $uid \">
            <input type=\"hidden\" name=\"tid\" value= $tid \"> 
            <input type=\"hidden\" name=\"pid\" value= $pid \"> 
            </form>
            <form action=\"postlist.php\" method=\"POST\">
            <input type=\"hidden\" name=\"uid\" value= $uid \">
            <input type=\"hidden\" name=\"tid\" value= $tid \"> 
            <input type=\"hidden\" name=\"pid\" value= $pid \"> 
            <input type=\"hidden\" name=\"type\" value= \"likes\" > 
            <button type=\"send\" class=\"like_button\"  >  <h2> Likes: ".$likes."<h2> </button> 
            </form>
            <form action=\"postlist.php\" method=\"POST\">
            <input type=\"hidden\" name=\"uid\" value= $uid \">
            <input type=\"hidden\" name=\"tid\" value= $tid \"> 
            <input type=\"hidden\" name=\"pid\" value= $pid \"> 
            <input type=\"hidden\" name=\"type\" value= \"dislikes\" > 
            <form action=\"postlist.php\" method=\"POST\">
            <button type=\"send\" class=\"delete\" ><h3> Dislikes: ".$dislikes."<h3> </button> <br>
            
            
            </form>
            </form>


            <form action=\"postlist.php\" method=\"POST\">
            <input type=\"hidden\" name=\"uid\" value= $uid \">
            <input type=\"hidden\" name=\"tid\" value= $tid \"> 
            <input type=\"hidden\" name=\"pid\" value= $pid \"> 
            <input type=\"hidden\" name=\"type\" value= \"del\" > 
            
            <button type=\"send\" class=\"delete\" ><h4> Delete <h4> </button> <br>
            
            </form>
            </div>");
        }
        else
        echo (
            "<div class=\"post1\"  id=\"PPP\"  > <br>
            <form action=\"realpost.php\" method=\"POST\">
            <input type=\"hidden\" name=\"uid\" value= $uid \">            
            <input type=\"hidden\" name=\"pid\" value= $pid \"> 
            <input type=\"hidden\" name=\"type\" value= \"nan\"> 
            <input type=\"hidden\" name=\"cidd\" value=  \"nan\"> 
            <button type=\"send\"  >  <h3> ".$text."</h3> <br> </button> 
            </form>
       
            <form action=\"postlist.php\" method=\"POST\">                
            <input type=\"hidden\" name=\"uid\" value= $uid \">
            <input type=\"hidden\" name=\"tid\" value= $tid \"> 
            <input type=\"hidden\" name=\"pid\" value= $pid \"> 
            </form>
            <form action=\"postlist.php\" method=\"POST\">
            <input type=\"hidden\" name=\"uid\" value= $uid \">
            <input type=\"hidden\" name=\"tid\" value= $tid \"> 
            <input type=\"hidden\" name=\"pid\" value= $pid \"> 
            <input type=\"hidden\" name=\"type\" value= \"likes\" > 
            <button type=\"send\" class=\"like_button\" >  <h2> Likes: ".$likes."<h2> </button> 
            </form>
            <form action=\"postlist.php\" method=\"POST\">
            <input type=\"hidden\" name=\"uid\" value= $uid \">
            <input type=\"hidden\" name=\"tid\" value= $tid \"> 
            <input type=\"hidden\" name=\"pid\" value= $pid \"> 
            <input type=\"hidden\" name=\"type\" value= \"dislikes\" > 
            <button type=\"send\"  ><h3> Dislikes: ".$dislikes."<h3> </button> <br>
            
            
            </form>


            <form action=\"postlist.php\" method=\"POST\">
            <input type=\"hidden\" name=\"uid\" value= $uid \">
            <input type=\"hidden\" name=\"tid\" value= $tid \"> 
            <input type=\"hidden\" name=\"pid\" value= $pid \"> 
            <input type=\"hidden\" name=\"type\" value= \"del\" > 
            
            <button type=\"send\" class=\"delete\" ><h4> Delete <h4> </button> <br>
            
            </form>
            </div>"

            
        );

        }
        

        echo("<form id=\"foot\" action=\"threadList.php\" method=\"POST\">    
        <input type=\"hidden\" name=\"uid\" value= $uid \">
        <input type=\"hidden\" name=\"tname\" value= \"nan\" > 
        <button type=\"send\"  class=\"button\" > <h1 >To Start </h1> </button>  <br>
    </form>");


    ?>
    

    
</body>
</html>