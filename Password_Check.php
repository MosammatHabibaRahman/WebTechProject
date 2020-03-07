<?php
    session_start();
	if(isset($_REQUEST['update']) && isset($_SESSION['id']))
	{
        $password = $_SESSION['password'];
        $current = $_REQUEST['current'];
        $new = $_REQUEST['new'];
        $password_conf = $_REQUEST['password_conf'];

        if(empty($current) || empty($new) || empty($password_conf))
        {
            header("location: PasswordUpdate.php");
        }
        else if($current != $password)
        {
            header("location: PasswordUpdate.php");
        }
        else if($new != $password_conf)
        {
            header("location: PasswordUpdate.php");
        }
        else
        {
            echo "Password successfully updated";
        }
    }
    else
    {
        header("location: Profile.php");
    }
?>