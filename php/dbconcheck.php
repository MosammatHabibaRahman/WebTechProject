<?php
    require('../service/functions.php');
    $result = getAllUsers();
    $data = fetch($result);  
?>