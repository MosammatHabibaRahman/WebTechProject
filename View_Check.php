<?php
    session_start();
    if(isset($_REQUEST['back']) && isset($_SESSION['user']['s_id']))
	{
		header("location: BrowseCourse.php");
    }
    else if(isset($_REQUEST['join']) && isset($_SESSION['user']['s_id']))
    {
        header("location: Class.php");
    }
    else if(isset($_REQUEST['back2']) && isset($_SESSION['user']['s_id']))
    {
        header("location: PremiumHome.php");
    }
    else if(isset($_REQUEST['drop']) && isset($_SESSION['user']['s_id']))
    {
        echo "You have droped <b>".$_SESSION['selected_course_name']."</b> course!<br>";
        echo "<a href = "."Course_View2.php".">Go Back</a>";
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