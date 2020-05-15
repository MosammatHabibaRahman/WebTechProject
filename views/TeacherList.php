<?php
    session_start();
    require('../service/functions.php');

    if(!isset($_SESSION['user']['s_id']))
    {
        header("location: ../views/Login.php");
    }

    $_SESSION['prev'] = 'TeacherList';
    
    $alpha = $_SESSION['A-Z'];
    $txt = $_SESSION['searchteacher'];
    $result = searchTeacher($alpha,$txt);
    $data = fetch($result);
?>

<html>
    <head>
        <title>Teacher's List</title>
    </head>
    </html>
    <body>
        <table width = 1010px>
        <tr>
            <td></td>
            <td width = 35px><a href = ../php/Logout.php><img src = ../logout.png width = 35px height = 35px></a></td>
        </tr>
        </table>
        <center><h1>Teacher's List</h1></center>
            <form method = "POST" action = "../php/Teacher_Check.php">
                <?php
                    $table = "";
                    if($data != NULL)
                    {
                        $table .= "<table border = 1 width = 1010px>
                        <tr>
                            <td><center><b>Name</b></center></td>
                            <td><center><b>Course Name</b></center></td>
                            <td><center><b>Join Course</b></center></td>
                        </tr>";
                    
                        foreach($data as $i)
                        {
                            $table .=   "<tr>
                                            <td><center>{$i['username']}</center></td>
                                            <td><center>{$i['course_name']}</center></td>
                                            <td><center><a href = Course_View.php?c_id={$i['c_id']}>Join Course</a></center></td>
                                        </tr>";
                        }
                    }
                    else
                    {
                        $table .= "<tr><td><center>Sorry, no teacher matches your search.</center></td></tr>";
                    }
                    echo $table;
                ?>
                </table>
                <br>
                <center><input type = "submit" name = "back" value = "Back"></center>
            </form>
        </center>
    </body>
</html>