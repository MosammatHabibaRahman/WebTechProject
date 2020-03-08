<?php
    session_start();
    if(!isset($_SESSION['id']))
    {
        header("location: Login.php");
    }
    
    $alpha = $_SESSION['A-Z'];
    $searchteacher = $_SESSION['searchteacher'];

    $lines = file("TeacherList.txt");
    $data = array();

    foreach($lines as $l)
    {
        array_push($data,explode('|',$l));
    } 
    $_SESSION['count_teachers'] = count($data);
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
            <td width = 35px><a href = Logout.php><img src = logout.png width = 35px height = 35px></a></td>
        </tr>
        </table>
        <center><h1>Teacher's List</h1></center>
            <form method = "POST" action = "Teacher_Check.php">
                <center>
                    <table border = 1 width = 500px>
                    <tr>
                        <td><center><b>Name</b></center></td>
                        <td><center><b>View Courses</b></center></td>
                    </tr>
                    <?php 
                        $print = "";
                        
                        if($alpha == "All Teachers" && empty($searchteacher))
                        {
                            $j=0;
                            foreach($data as $d)
                            {
                                $print .= "<tr>
                                <td><center>".$d[1]."</center></td>
                                <td><center><input type="."submit"." name="."view".$j." value="."View Courses"."></center></td>
                                </tr>";
                                $j++;
                            }
                        }
                        $print .= "</table>";

                        echo $print;
                    ?>
                    <br>
                    <input type = "submit" name = "back" value = "Back">
                </center>
            </form>
        </center>
    </body>
</html>