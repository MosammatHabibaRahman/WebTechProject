<?php
    setcookie('premium','Premium Student',time()-10,'/');
    setcookie('basic','Basic Student',time()-10,'/');
    header("location: ../LearningField.php");
?>