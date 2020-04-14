<?php
    session_start();
    if(isset($_REQUEST['submitpic']) && isset($_SESSION['id']))
    {
        $filename = $_FILES['propic']['name'];
        $newname = "newfile.png";
        $src = $_FILES['propic']['tmp_name'];
        $dest = "ProfilePictures/".$newname;
        $_SESSION['propic'] = $newname;
        move_uploaded_file($src,$dest);

        header("Location: Profile.php");
    }
    else
    {
        header("Location: Login.php");
    }
?>