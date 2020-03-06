<?php
	session_start();
	if(!isset($_SESSION['username']))
	{
		header("location: Login.php");
    }

    $id = $_SESSION['id'];
    $username = $_SESSION['username'];
?>

<html>
    <head>
        <title>Home Page</title>
    </head>
    <body>
            <form method = POST action = home_check.php>
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
                        <td><center><input type = "text" name = "searchtxt" value = ""></center></td>
                        <td><center><input type = "submit" name = "search" value = "Search"></center></td>
                        <td>
                            <center>OR Find a Teacher: 
                                <select name = A-Z>
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
                        <td><center><a href = "Logout.php"><u>Logout</u></a></center></td>
                        <td><center><a href = "Profile.php"><u>My Profile</u></a></center></td>
                    </tr>
                    <tr>
                        <td colspan = 8>
                            <br>
                            <center><u><h1>Your Courses</h1></u><br></center>
                        </td>
                    </tr>
                </table>
                <table border = 1 width = 1010px>
                    <tr>
                        <td><center><b>Course Name</b></center></td>
                        <td><center><b>No. of Classes</b></center></td>
                        <td><center><b>Course Type</b></center></td>
                        <td><center><b>Average Rating</b></center></td>
                        <td><center><b>Teacher</b></center></td>
                        <td><center><b>Category</b></center></td>
                        <td><center><b>Status</b></center></td>
                    </tr>
                </table>
            </form>
    </body>
</html>