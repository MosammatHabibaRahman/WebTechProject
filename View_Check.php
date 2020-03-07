<?php
    session_start();
    if(isset($_REQUEST['back']) && isset($_SESSION['id']))
	{
		header("location: BrowseCourse.php");
    }
    else if(isset($_REQUEST['join']) && isset($_SESSION['id']))
    {
        header("location: Class.php");
    }
?>