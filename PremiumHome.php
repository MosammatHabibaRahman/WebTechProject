<?php
	session_start();
	if(!isset($_SESSION['id']))
	{
		header("location: Login.php");
    }

    $id = $_SESSION['id'];
    $username = $_SESSION['username'];

    $list = file("Student_List.txt");
    $row = array();
    foreach($list as $i)
    {
        array_push($row,explode('|',$i));
    }

    $usercourse = array();
    foreach($row as $r)
    {
        if(trim($r[2]) == $id)
        {
            array_push($usercourse,trim($r[1]));
        }
    }

    $lines = file("Course_Info.txt");
    $data = array();
    foreach($lines as $l)
    {
        array_push($data,explode('|',$l));
    }
    
    $_SESSION['course_count'] = count($usercourse);
?>

<html>
    <head>
        <title>Home Page</title>
    </head>
    <body>
        <form method = POST action = PrmHome_Check.php>
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
                    <td><center><a href = "Profile.php"><u>My Profile</u></a></center></td>
                    <td width = 35px><a href = "Logout.php"><img src = "logout.png" width = 35px height = 35px></a></td>
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
                    <td><center><b>Category</b></center></td>
                    <td><center><b>Status</b></center></td>
                    <td><center><b>View</b></center></td>
                </tr>
                <?php 
                    $print = "";
                    $j = 0;
                    foreach($data as $d)
                    {
                        if($usercourse[$j] == trim($d[0]))
                        {
                            $print .= "<tr>
                            <td><center>".$d[1]."</center></td>
                            <td><center>".$d[2]."</center></td>
                            <td><center>".$d[3]."</center></td>
                            <td><center>".$d[4]."</center></td>
                            <td><center>".$d[6]."</center></td>
                            <td><center>".$d[7]."</center></td>
                            <td><center><input type="."submit"." name="."view".$j." value="."View"."></center></td>
                            </tr>";
                            
                            $_SESSION['usercourse'][$j] = trim($d[0]);
                            $j++;
                        }
                        
                        if($j>=count($usercourse))
                        {
                            break;
                        }
                    }
                    echo $print;
                ?>
            </table>
            <br>
            <center><input type = "submit" name = "cancelprm" value = "Cancel Premium Membership"></center>      
        </form>
    </body>
</html>