<?php
    session_start();
    require('../service/functions.php');
    
    if(!isset($_SESSION['user']['s_id']))
    {
        header("location: ../views/Login.php");
    }
    else
    {
        $id = $_SESSION['user']['s_id'];
        $c_id = $_SESSION['c_id'];
        $result = dropCourse($id,$c_id);
        echo $result;
    }
?>
<html>
    <br>
    <a href = "../views/PremiumHome.php">Go Home</a>
</html>