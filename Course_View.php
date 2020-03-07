<?php
    session_start();
    if(!isset($_SESSION['id']))
    {
        header("location: Login.php");
    }
    else
    {
        $selected_course = $_SESSION['selected_course'];
        $lines = file("Course_Info.txt");
        $data = array();
        foreach($lines as $l)
        {
            array_push($data,explode('|',$l));
        }
        
        foreach($data as $d)
        {
            if($d[0] == $selected_course)
            {
                $name = $d[1];
                $no_of_classes = $d[2];
                $type = $d[3];
                $rating = $d[4];
                $t_id = $d[5];
                $category = $d[6];
                $status = $d[7];
                $_SESSION['selected_course_name'] = $name;
                break;
            }
        }

        $lines2 = file("TeacherList.txt");
        $data2 = array();
        foreach($lines2 as $l)
        {
            array_push($data2,explode('|',$l));
        }
        
        foreach($data2 as $d)
        {
            if($d[0] == $t_id)
            {
                $teacher = $d[1];
                break;
            }
        }
    }
?>
<html>
	<head>
		<title>Course Detail</title>
	</head>
	<body>
        <table width = 1010px>
            <tr>
                <td></td>
                <td width = 35px><a href = "Logout.php"><img src = "logout.png" width = 35px height = 35px></a></td>
            </tr>
        </table>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <form method = "POST" action = "View_Check.php">
            <center>
                <fieldset style="width:350px">
                    <legend>Course Details</legend>
                    <table width = 350px>
                    <tr>
                        <td>Course Name: </td>
                        <td><?= $name ?></td>
                    </tr>
                    <tr>
                        <td>Category: </td>
                        <td><?= $category ?></td>
                    </tr>
                    <tr>
                        <td>Course Teacher: </td>
                        <td><?= $teacher ?></td>
                    </tr>
                    <tr>
                        <td>No. of classes: </td>
                        <td><?= $no_of_classes ?></td>
                    </tr>
                    <tr>
                        <td>Average Rating: </td>
                        <td><?= $rating ?></td>
                    </tr>
                    <tr>
                        <td>Category: </td>
                        <td><?= $category ?></td>
                    </tr>
                    <tr>
                        <td>Course Type: </td>
                        <td><?= $type ?></td>
                    </tr>
                </table>
                <br>
                <input type = "submit" name = "back" value = "Back">
                <input type = "submit" name = "join" value = "Join">
                </fieldset>
            </center>
        </form>
	</body>
</html>