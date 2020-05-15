<?php
    session_start();
    require('../service/functions.php');

    if(!isset($_SESSION['user']['s_id']))
    {
        header("location: Login.php");
    }
    else
    {
        $l_id = $_GET['l_id'];
        $result = getSelectedLecture($l_id);
        $data = fetch($result);
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
            </center>
        </form>
    </body>
</html>