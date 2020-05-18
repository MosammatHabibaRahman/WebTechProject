<?php
    session_start();
    require('../service/functions.php');

    if(!isset($_SESSION['user']['s_id']) || !isset($_REQUEST['key']))
    {
        header("location: ../views/Login.php");
    }

    $id = $_SESSION['user']['s_id'];
    $l_id = $_SESSION['current_lecture'];

    $key = $_REQUEST['key'];
    if($key == "bookmark")
    {
        $result = createBookmark($id,$l_id);
        echo $result;
    }
?>