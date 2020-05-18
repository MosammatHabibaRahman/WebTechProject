<?php
    session_start();
    require('../service/functions.php');

    if(!isset($_SESSION['user']['s_id']))
    {
        header("location: Login.php");
    }
    else
    {
        $id = $_SESSION['user']['s_id'];
        $l_id = $_GET['l_id'];
        $_SESSION['current_lecture'] = $l_id;
        $result = getSelectedLecture($l_id);
        $data = fetch($result);

        $bookmark = findBookmark($id,$l_id);
        $bkm = fetch($bookmark);
    }
?>
<html>
    <head>
        <title><?=$name?></title>
    </head>
    <body>
        <form method = POST action = ../php/ClassCheck.php>
            <table width = 1010px>
                <tr>
                    <td></td>
                    <td width = 35px><a href = "../php/Logout.php"><img src = "../logout.png" width = 35px height = 35px></a></td>
                </tr>
            </table>
            <center>
                <h2><?=$data[0]['lecture_name']?></h2>
                <video width="320" height="390" controls>
                    <source src="../Videos/<?=$data[0]['lecture_name']?>.mp4" type="video/mp4">
                </video>
                <br><br>
                <input type = "submit" name = "back2" value = "Back">
                <?php
                    $str = "";
                    if($bkm == NULL)
                    {
                        $str = "<input type = "."button ". "id = "."bookmark "."name = "."bookmark " ."onclick = "."Mark() "."value = "."+Bookmark".">";
                        echo $str;
                    }
                ?>
                <!-- <input id = "bookmark" type = "button" name = "bookmark" value = "+ Bookmark" onclick = "Mark()"> -->
            </center>
        </form>
        <script type = "text/javascript">
            function Mark()
            {
                var key = "bookmark";
                var xhttp = new XMLHttpRequest();	
			    xhttp.onreadystatechange = function()
                {
                    if(this.readyState == 4 && this.status == 200)
                    {
                        alert(this.responseText);
                    }
                };

                xhttp.open("POST", "../php/BookmarkCheck.php", true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send("key="+key); 
            }
        </script>
    </body>
</html>