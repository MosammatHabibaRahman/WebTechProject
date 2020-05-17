<?php
    session_start();
    
    if(isset($_REQUEST['premium']))
	{
        $_SESSION['RegCheck'] = "premium";
        header("location: ../views/RegisterPrm.php");
    }
    else
    {
        $_SESSION['RegCheck'] = "basic";
        echo "Basic Student Registeration";
    }
?>