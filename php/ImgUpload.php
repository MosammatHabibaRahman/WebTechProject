<?php
    session_start();
    require('../service/functions.php');

    if(isset($_REQUEST['submitpic']) && isset($_SESSION['user']['s_id']))
    {
        $id = $_SESSION['user']['s_id'];
        $filename = $_FILES['propic']['name'];
        $newname = time().".png";
        $src = $_FILES['propic']['tmp_name'];
        $dest = "../ProfilePictures/".$newname;
        move_uploaded_file($src,$dest);
        $_SESSION['user']['propic'] = $newname;
        $result = updateProPic($id,$newname);

        if($result != "Error")
        {
            header("Location: ../views/Profile.php");
        }
        else
        {
            echo $result;
        }
    }
    else
    {
        header("Location: ../views/Login.php");
    }
?>