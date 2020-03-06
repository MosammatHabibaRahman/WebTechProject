<?php
    setcookie('cancel','Cancel',time()-10,'/');
    header("location: Start.php");
?>