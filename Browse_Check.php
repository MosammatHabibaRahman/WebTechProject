<?php
    session_start();
    if(isset($_REQUEST['back']) && isset($_SESSION['id']))
	{
		header("location: PremiumHome.php");
    }
    else
    {
        $course_count = $_SESSION['course_count'];
        for($i=0; i<$course_count; $i++)
        {
            $view = "view".$i;
            if(isset($_REQUEST[$view]))
            {
                $_SESSION['selected_course'] = "C-".$i;
                header("location: Course_View.php");
            }
        }
    }
?>