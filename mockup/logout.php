<?php
    session_start(); 
 
   if (isset($_COOKIE['username'])){
    // $user = $_SESSION['username'];
    setcookie("username",'',time()-300);
   }
   if (isset($_COOKIE['level'])){
    // $user = $_SESSION['username'];
    setcookie("level",'',time()-300);
   }
   if (isset($_SESSION['username'])){
        unset($_SESSION['username']);
   }
   
   header('location:index.php');
?>