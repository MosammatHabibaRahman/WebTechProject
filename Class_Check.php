<?php
    session_start();
    if(isset($_REQUEST['back']))
    {
        header("location: Course_View.php");
    }
?>
