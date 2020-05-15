<?php
    session_start();
    require('../service/functions.php');

    if(isset($_REQUEST['confirm']) && isset($_SESSION['user']['s_id']))
    {
        $id = $_SESSION['user']['s_id'];
        $actual_password = $_SESSION['user']['password'];
        $password = $_REQUEST['password'];
        $password_conf = $_REQUEST['password_conf'];

        if(empty($password) || empty($password_conf))
        {
            header("location: ../views/DeleteAccount.php");
        }
        else if($password != $password_conf)
        {
            header("location: ../views/DeleteAccount.php");
        }
        else if($password != $actual_password)
        {
            header("location: ../views/DeleteAccount.php");
        }
        else
        {
            $result = deleteStudent($id);
            if($result != "Error")
            {
                header("location: ../php/Logout.php");
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
?>