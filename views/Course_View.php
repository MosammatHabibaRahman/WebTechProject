<?php
    session_start();
    require('../service/functions.php');

    if(!isset($_SESSION['user']['s_id']))
    {
        header("location: Login.php");
    }
    else
    {
        $s_id = $_SESSION['user']['s_id'];
        $c_id = $_GET['c_id'];
        $_SESSION['c_id'] = $c_id;
        settype($c_id,"integer");
        $course = getSelectedCourse($c_id);
        $count = countStudentsInCourse($c_id);
    }
?>
<html>
	<head>
		<title>Course Details</title>
	</head>
	<body>
        <table width = 1010px>
            <tr>
                <td></td>
                <td width = 35px><a href = "../php/Logout.php"><img src = "../logout.png" width = 35px height = 35px></a></td>
            </tr>
        </table>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <form method = "POST" action = "../php/View_Check.php">
            <center>
                <fieldset style="width:350px">
                    <legend>Course Details</legend>
                    <table width = 350px>
                    <tr>
                        <td>Course Name: </td>
                        <td><?= $course['course_name'] ?></td>
                    </tr>
                    <tr>
                        <td>Course Teacher: </td>
                        <td><?= $course['username'] ?></td>
                    </tr>
                    <tr>
                        <td>No. of classes: </td>
                        <td><?= $course['no_of_classes'] ?></td>
                    </tr>
                    <tr>
                        <td>Average Rating: </td>
                        <td><?= $course['avg_rating'] ?></td>
                    </tr>
                    <tr>
                        <td>Category: </td>
                        <td><?= $course['category'] ?></td>
                    </tr>
                    <tr>
                        <td>Course Type: </td>
                        <td><?= $course['course_type'] ?></td>
                    </tr>
                    <tr>
                        <td>No. of students enrolled: </td>
                        <td><?= $count['count'] ?></td>
                    </tr>
                </table>
                <br>
                <input type = "submit" name = "back" value = "Back">
                <?php 
                    $print = "";
                    if(checkIfEnrolled($s_id,$c_id) == "true")
                    {
                        $print .= "<input type = "."submit ". "name = "."drop " ."value = "."Drop"."><br><h5 style=color:red>You are already enrolled in this course.</h5>";   
                    }
                    else
                    {
                        $print .= "<input type = "."submit ". "name = "."join " ."value = "."Join".">";
                    }
                    echo $print;
                ?>
                </fieldset>
            </center>
        </form>
	</body>
</html>