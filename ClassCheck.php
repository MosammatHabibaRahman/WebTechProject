<?php
    session_start();

    if(isset($_REQUEST['back']) && isset($_SESSION['user']['s_id']))
	{
        header("location: PremiumHome.php");
    }
    else if(isset($_REQUEST['back2']) && isset($_SESSION['user']['s_id']))
    {
        header("location: Class.php");
    }
    else
    {
        header("location: Login.php");
    }
?>