<?php
    session_start();
    if(isset($_REQUEST['back']) && isset($_SESSION['user']['s_id']))
	{
		header("location: ../views/PremiumHome.php");
    }
    else
    {
        header("location: ../views/Login.php");
    }
?>