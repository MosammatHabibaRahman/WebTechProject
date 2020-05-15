<?php
    session_start();
    require('../service/functions.php');
    
    if(!isset($_SESSION['user']['s_id']))
	{
		header("location: Login.php");
    }

    $_SESSION['prev'] = 'BrowseCourse';
    
    $category = $_SESSION['category'];
    $txt = $_SESSION['searchtxt'];
    $result = browseCourse($txt,$category);
    $data = fetch($result);
?>

<html>
    <head>
        <title>Browse Courses</title>
    </head>
    <body>
        <table width = 1010px>
        <tr>
            <td></td>
            <td width = 35px><a href = "../php/Logout.php"><img src = "../logout.png" width = 35px height = 35px></a></td>
        </tr>
        </table>
        <center><h1>Course List</h1></center>
        <form method = "POST" action = "../php/Browse_Check.php">
            <?php
                $table = "";
                if($data != NULL)
                {
                    $table .= "<table border = 1 width = 1010px>
                    <tr>
                        <td><center><b>Course Name</b></center></td>
                        <td><center><b>No. of Classes</b></center></td>
                        <td><center><b>Course Type</b></center></td>
                        <td><center><b>Average Rating</b></center></td>
                        <td><center><b>Status</b></center></td>
                        <td><center><b>Category</b></center></td>
                        <td><center><b>Teacher</b></center></td>
                        <td><center><b>Enroll</b></center></td>
                    </tr>";
                
                    foreach($data as $i)
                    {
                        $table .=   "<tr>
                                        <td><center>{$i['course_name']}</center></td>
                                        <td><center>{$i['no_of_classes']}</center></td>
                                        <td><center>{$i['course_type']}</center></td>
                                        <td><center>{$i['avg_rating']}</center></td>
                                        <td><center>{$i['status']}</center></td>
                                        <td><center>{$i['category']}</center></td>
                                        <td><center>{$i['username']}</center></td>
                                        <td><center><a href = Course_View.php?c_id={$i['c_id']}>Join Course</a></center></td>
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
    </body>
</html>