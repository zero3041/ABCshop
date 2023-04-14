<?php
    $conn = mysqli_connect("localhost","root","","db_but");
    $sel = mysqli_select_db($conn,'db_but') or die('Could not select database.');
    mysqli_set_charset($conn,"utf8");
?>