<?php
    session_start();
    if(isset($_REQUEST['confirm']) && isset($_SESSION['id']))
    {
        $actual_password = $_SESSION['password'];
        $password = $_REQUEST['password'];
        $password_conf = $_REQUEST['password_conf'];

        if(empty($password) || empty($password_conf))
        {
            header("location: DeleteAccount.php");
        }
        else if($password != $password_conf)
        {
            header("location: DeleteAccount.php");
        }
        else if($password != $actual_password)
        {
            header("location: DeleteAccount.php");
        }
        else
        {
            header("location: Logout.php");
        }
    }
    else if(isset($_REQUEST['cancel']) && isset($_SESSION['id']))
    {
       header("location: Profile.php");
    }
    
?>