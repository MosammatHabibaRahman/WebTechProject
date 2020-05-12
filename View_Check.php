<?php
    session_start();

    if(isset($_REQUEST['back']) && isset($_SESSION['user']['s_id']))
	{
        if($_SESSION['prev'] == 'BrowseCourse')
        {
            header("location: BrowseCourse.php");
        }
        else if($_SESSION['prev'] == 'TeacherList')
        {
            header("location: TeacherList.php");
        }
    }
    else if(isset($_REQUEST['join']) && isset($_SESSION['user']['s_id']))
    {
        header("location: JoinCourse.php");
    }
    else if(isset($_REQUEST['back2']) && isset($_SESSION['user']['s_id']))
    {
        header("location: PremiumHome.php");
    }
    else if(isset($_REQUEST['drop']) && isset($_SESSION['user']['s_id']))
    {
        header("location: DropCourse.php");
    }
    else if(isset($_REQUEST['watch']) && isset($_SESSION['user']['s_id']))
    {
        header("location: Class.php");
    }
    else
    {
        header("location: Login.php");
    }
?>