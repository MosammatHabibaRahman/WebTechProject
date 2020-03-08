<?php
    session_start();
    if(isset($_REQUEST['back']) && $_SESSION['courseview'] == 1)
    {
        header("location: Course_View.php");
    }
    else if(isset($_REQUEST['back']) && $_SESSION['courseview'] == 2)
    {
        header("location: Course_View2.php");
    }
?>
