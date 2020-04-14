<?php
    session_start();
    if(isset($_REQUEST['back']) && isset($_SESSION['user']['id']))
	{
		header("location: PremiumHome.php");
    }
    else
    {
        $count = $_SESSION['count_teachers'];
        for($i=0; $i<$count; $i++)
        {
            $view = "view".$i;
            if(isset($_REQUEST[$view]))
            {
                $_SESSION['selected_teacher'] = "T-".$i;
                echo $_SESSION['selected_teacher']."'s courses listed here";
            }
        }
    }
?>