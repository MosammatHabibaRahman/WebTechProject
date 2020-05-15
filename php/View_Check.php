<?php
    session_start();

    if(isset($_REQUEST['back']) && isset($_SESSION['user']['s_id']))
	{
        if($_SESSION['prev'] == 'BrowseCourse')
        {
            header("location: ../views/BrowseCourse.php");
        }
        else if($_SESSION['prev'] == 'TeacherList')
        {
            header("location: ../views/TeacherList.php");
        }
    }
    else if(isset($_REQUEST['join']) && isset($_SESSION['user']['s_id']))
    {
        header("location: ../php/JoinCourse.php");
    }
    else if(isset($_REQUEST['back2']) && isset($_SESSION['user']['s_id']))
    {
        header("location: ../views/PremiumHome.php");
    }
    else if(isset($_REQUEST['drop']) && isset($_SESSION['user']['s_id']))
    {
        header("location: ../php/DropCourse.php");
    }
    else if(isset($_REQUEST['watch']) && isset($_SESSION['user']['s_id']))
    {
        header("location: ../views/Class.php");
    }
    else
    {
        header("location: ../views/Login.php");
    }
?>