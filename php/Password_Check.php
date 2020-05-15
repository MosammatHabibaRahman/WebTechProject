<?php
    session_start();
    require('../service/functions.php');

	if(isset($_REQUEST['update']) && isset($_SESSION['user']['s_id']))
	{
        $id = $_SESSION['user']['s_id'];
        $password = $_SESSION['user']['password'];
        $current = $_REQUEST['current'];
        $new = $_REQUEST['new'];
        $password_conf = $_REQUEST['password_conf'];

        if(empty($current) || empty($new) || empty($password_conf))
        {
            header("location: ../views/PasswordUpdate.php");
        }
        else if($current != $password)
        {
            header("location: ../views/PasswordUpdate.php");
        }
        else if($new != $password_conf)
        {
            header("location: ../views/PasswordUpdate.php");
        }
        else
        {
            $result = updatePassword($id,$new);
            if($result != "Error")
            {
                echo $result;
            }
            else
            {
                echo $result;
            }
        }
    }
    else if(isset($_REQUEST['cancel']) && isset($_SESSION['user']['s_id']))
    {
        header("location: ../views/Profile.php");
    }
    else
    {
        header("location: ../views/Login.php");
    }
?>
<html>
    <a href = "../views/Profile.php">Go Back</a>
</html>