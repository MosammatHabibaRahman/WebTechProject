<?php
    if(isset($_REQUEST['premium']))
	{
        setcookie('premium','Premium Student',time()+120,'/');
        header("location: ../views/RegisterPrm.php");
    }
    else
    {
        setcookie('basic','Basic Student',time()+120,'/');
        echo "Basic Student Registeration";
    }
?>