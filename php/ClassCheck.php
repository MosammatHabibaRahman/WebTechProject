<?php
    session_start();

    if(isset($_REQUEST['back']) && isset($_SESSION['user']['s_id']))
	{
        header("location: ../views/PremiumHome.php");
    }
    else if(isset($_REQUEST['back2']) && isset($_SESSION['user']['s_id']))
    {
        $prev = $_SESSION['prev'];
        if($prev == "Class")
        {
            header("location: ../views/Class.php");
        }
        else if($prev == "MyBookmarks")
        {
            header("location: ../views/MyBookmarks.php");
        }
    }
    else
    {
        header("location: ../views/Login.php");
    }
?>