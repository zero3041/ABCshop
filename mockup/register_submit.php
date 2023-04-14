<?php
    session_start();
    include 'connect.php';
    if( isset($_POST['submit-dangky']) && $_POST['username'] != '' && $_POST['password'] != '' && $_POST['repassword'] != ''){
        // xu ly nguoi dung dang ky
        $username = $_POST['username'];
        $password = $_POST['password'];
        $repassword = $_POST['repassword'];
        if($password != $repassword){
            $_SESSION["thongbao"] = "Vui lòng nhập khẩu chính xác";
            header("location:register.php");
            die();
        }
        $level = 0;
        $sql = "SELECT * FROM user WHERE username='$username'";
        $old = mysqli_query($conn,$sql);
        $password = md5($password);
        if( mysqli_num_rows($old) > 0){
            $_SESSION["thongbao"] = "Tên tài khoản tồn tại";
            header("location:register.php");
            die();
        }
        $sql = "INSERT INTO user (username,password,level) VALUES ('$username','$password','$level')";
        mysqli_query($conn,$sql);
        $_SESSION["thongbao"] = "Bạn đã đăng ký thành công";
        header('location:login.php');
        // echo("Đã đăng ký thành công");
    }else{
        $_SESSION["thongbao"] = "Vui lòng nhập đầy đủ thông tin";
        header("location:register.php");
    }
    if(isset($_POST['submit-dangnhap'])){
        header('location:login.php');
    }
?>