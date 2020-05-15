<?php
    session_start();
    if(isset($_REQUEST['back']) && isset($_SESSION['user']['s_id']))
    {
        header("location: ../views/PremiumHome.php");
    }
    else if((isset($_REQUEST['updateProfile']) && isset($_SESSION['user']['s_id'])))
    {
        header("location: ../views/Update.php");
    }
    else if((isset($_REQUEST['updatePassword']) && isset($_SESSION['user']['s_id'])))
    {
        header("location: ../views/PasswordUpdate.php");
    }
    else if((isset($_REQUEST['delete']) && isset($_SESSION['user']['s_id'])))
    {
        header("location: ../views/DeleteAccount.php");
    }
    else
    {
        header("location: ../views/Profile.php");
    }
?>