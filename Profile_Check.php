<?php
    session_start();
    if(isset($_REQUEST['back']) && isset($_SESSION['id']))
    {
        header("location: PremiumHome.php");
    }
    else if((isset($_REQUEST['updateProfile']) && isset($_SESSION['id'])))
    {
        header("location: Update.php");
    }
    else if((isset($_REQUEST['updatePassword']) && isset($_SESSION['id'])))
    {
        header("location: PasswordUpdate.php");
    }
?>