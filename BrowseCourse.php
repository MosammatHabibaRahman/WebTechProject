<?php
	session_start();
	if(!isset($_SESSION['id']))
	{
		header("location: Login.php");
    }

    $category = $_SESSION['category'];
    $searchtext = $_SESSION['searchtext'];

    $lines = file("Course_Info.txt");
    $data = array();
    foreach($lines as $l)
    {
        array_push($data,explode('|',$l));
    }
    $_SESSION['course_count'] = count($data);
    $usercourse = $_SESSION['usercourse'];
    
    $table = "<html>
                <head>
                    <title>Browse Courses</title>
                </head>
            </html>
            <body>
                <table width = 1010px>
                <tr>
                    <td></td>
                    <td width = 35px><a href = "."Logout.php"."><img src = "."logout.png"." width = 35px height = 35px></a></td>
                </tr>
                </table>
                <center><h1>Course List</h1></center>
                <form method = "."POST action = "."Browse_Check.php".">
                    <table border = 1 width = 1010px>
                    <tr>
                        <td><center><b>Course Name</b></center></td>
                        <td><center><b>No. of Classes</b></center></td>
                        <td><center><b>Course Type</b></center></td>
                        <td><center><b>Average Rating</b></center></td>
                        <td><center><b>Teacher</b></center></td>
                        <td><center><b>Category</b></center></td>
                        <td><center><b>Status</b></center></td>
                        <td><center><b>View Details</b></center></td>
                    </tr>";

    if($category == "All Courses" && empty($searchtext))
    {
        $j = 0;

        foreach($data as $i)
        {
            $table .=   "<tr>
                            <td><center>".$i[1]."</center></td>
                            <td><center>".$i[2]."</center></td>
                            <td><center>".$i[3]."</center></td>
                            <td><center>".$i[4]."</center></td>
                            <td><center>".$i[5]."</center></td>
                            <td><center>".$i[6]."</center></td>
                            <td><center>".$i[7]."</center></td>
                            <td><center><input type = "."submit"." name = "."view".$j." value = "."View"."></center></td>
                        </tr>";
            $j++;
        }
    }

    $table .= "</table></form></body>";

    echo $table;
?>

<html>
    <body>
        <br>
        <center>
            <form method = "POST" action = "Browse_Check.php">
                <input type = "submit" name = "back" value = "Back">
            </form>
        </center>
    </body>
</html>