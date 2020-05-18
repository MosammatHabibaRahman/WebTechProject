<?php
    session_start();
    require('../service/functions.php');

    if(!isset($_SESSION['user']['s_id']))
    {
        header("location: Login.php");
    }
    else
    {
        $_SESSION['prev'] = "Class";
        $c_id = $_SESSION['c_id'];
        $result = getAllLectures($c_id);
        $data = fetch($result);
    }
?>
<html>
    <head>
        <title><?=$data[0]['course_name']." Lectures"?></title>
    </head>
    <body>
        <form method = POST action = ../php/ClassCheck.php>
            <table width = 1010px>
                <tr>
                    <td></td>
                    <td width = 35px><a href = "../php/Logout.php"><img src = "../logout.png" width = 35px height = 35px></a></td>
                </tr>
            </table>
            <center><h1><?=$data[0]['course_name']." Lectures"?></h1></center>
            <?php
                $table = "";
                if($data != NULL)
                {
                    $table .= "<table border = 1 width = 1010px>
                    <tr>
                        <td><center><b>Lecture Name</b></center></td>
                        <td><center><b>Watch Now</b></center></td>
                    </tr>";
                
                    foreach($data as $d)
                    {
                        $table .=   "<tr>
                                        <td><center>{$d['lecture_name']}</center></td>
                                        <td><center><a href = Lecture.php?l_id={$d['l_id']}>Watch Now</a></center></td>
                                    </tr>";
                    }
                }
                else
                {
                    $table .= "<tr><td><center>Sorry, no courses match your search.</center></td></tr>";
                }
                echo $table;
            ?>
        </table>
        <br>
        <center>
            <input type = "submit" name = "back" value = "Back">
        </center>
        </form>
    </body>
</html>