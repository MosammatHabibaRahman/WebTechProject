<?php
    session_start();
    require('service/functions.php');

    if(!isset($_SESSION['user']['s_id']))
    {
        header("location: Login.php");
    }
    else
    {
        $c_id = $_SESSION['c_id'];
    }
?>