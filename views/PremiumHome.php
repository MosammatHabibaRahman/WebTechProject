<?php
    session_start();
    require('../service/functions.php');

	if(!isset($_SESSION['user']['s_id']) && $_SESSION['user']['usertype'] != "Premium Student")
	{
		header("location: Login.php");
    }

    $id = $_SESSION['user']['s_id'];
    $username = $_SESSION['user']['username'];

    $data = getStudentCourses($id);
    $course = fetch($data);
?>

<html>
    <head>
        <title>Home Page</title>
        <link rel="stylesheet" type="text/css" href="../style.css">
    </head>
    <body>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v7.0"></script>
        <form method = POST action = ../php/PrmHome_Check.php autocomplete = "off">

            <table width = 1010px>
                <tr>
                    <td colspan = 8><center><h1>Welcome <?=$username?>!</h1><br></center></td>
                </tr>
                <tr>
                    <td>
                        <center>Browse:
                            <select name = category>
                                <option>All Courses</option>
                                <option>Art</option>
                                <option>Business</option>
                                <option>Film Making</option>
                                <option>Music</option>
                                <option>Photography</option>
                                <option>Productivity</option>
                                <option>Programming</option>
                                <option>Web Development</option>
                            </select>
                        </center>
                    </td>
                    <td><center><input id = "searchtxt" type = "text" name = "searchtxt" value = ""></center></td>
                    <td><center><input type = "submit" name = "search" value = "Search"></center></td>
                    <td>
                        <center>OR Find a Teacher: 
                            <select name = "A-Z">
                                <option>All Teachers</option>
                                <option>A</option>
                                <option>B</option>
                                <option>C</option>
                                <option>D</option>
                                <option>E</option>
                                <option>F</option>
                                <option>G</option>
                                <option>H</option>
                                <option>I</option>
                                <option>J</option>
                                <option>K</option>
                                <option>L</option>
                                <option>M</option>
                                <option>N</option>
                                <option>O</option>
                                <option>P</option>
                                <option>Q</option>
                                <option>R</option>
                                <option>S</option>
                                <option>T</option>
                                <option>U</option>
                                <option>V</option>
                                <option>W</option>
                                <option>X</option>
                                <option>Y</option>
                                <option>Z</option>
                            </select>
                        </center>
                    </td>
                    <td><center><input type = "text" name = "searchteacher" value = ""></center></td>
                    <td><center><input type = "submit" name = "search2" value = "Search"></center></td>
                    <td><center><a href = "../views/Profile.php"><u>My Profile</u></a></center></td>
                    <td width = 35px><a href = "../php/Logout.php"><img src = "../logout.png" width = 35px height = 35px></a></td>
                </tr>
                <tr>
                    <td colspan = 8>
                        <br>
                        <center><u><h1>Your Courses</h1></u><br></center>
                    </td>
                </tr>
            </table>
            <?php 
                $print = "";
                if($course != NULL)
                {
                    $print = "<table id = "."courses" ."border = 1 width = 1010px>
                    <tr id = "."header".">
                        <td id = "."td"."><center><b>Course Name</b></center></td>
                        <td id = "."td"."><center><b>No. of Classes</b></center></td>
                        <td id = "."td"."><center><b>Course Type</b></center></td>
                        <td id = "."td"."><center><b>Average Rating</b></center></td>
                        <td id = "."td"."><center><b>Status</b></center></td>
                        <td id = "."td"."><center><b>Category</b></center></td>
                        <td id = "."td"."><center><b>View</b></center></td>
                    </tr>";
                    for($it=0; $it<count($course);$it++)
                    {
                        $print .= "<tr id = "."th".">
                        <td id = "."td"."><center>{$course[$it]['course_name']}</center></td>
                        <td id = "."td"."><center>{$course[$it]['no_of_classes']}</center></td>
                        <td id = "."td"."><center>{$course[$it]['course_type']}</center></td>
                        <td id = "."td"."><center>{$course[$it]['avg_rating']}</center></td>
                        <td id = "."td"."><center>{$course[$it]['status']}</center></td>
                        <td id = "."td"."><center>{$course[$it]['category']}</center></td>
                        <td id = "."td"."><center><a href=EnrolledView.php?c_id={$course[$it]['c_id']}</a>View</a></center></td>
                        </tr>";
                    }
                }
                else
                {
                    $print .= "<tr><td><center>You have not enrolled in any courses yet.</center></td>
                    <td><center><a href=BrowseCourse.php>Click here to view the list of offered courses.</a></center></td></tr>";
                }
                echo $print;
            ?>
            </table>
            <br>
            <center>
            <input type = "submit" name = "myBookmarks" value = "My +Bookmarks">
            <input type = "submit" name = "cancelprm" value = "Cancel Premium Membership"><br><br>
            <div class="fb-share-button" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Flocalhost%3A8080%2FWebTechProject%2Fviews%2FLogin.php&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div>
            <br><br>
            <a href="faqs.php">FAQs</a>
            </center>      
        </form>
    </body>
</html>