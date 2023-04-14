<?php
    session_start();
    include 'lib_db.php';
    include 'connect.php';
    // print_r($_POST);
    // include 'check.php';
    if( isset($_POST['submit_dangnhap']) && $_POST['username'] != '' && $_POST['password'] != ''){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $password = md5($password);
        $ajax = isset($_POST['ajax']) ? $_POST['ajax'] : 0; 
        $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
        $user = mysqli_query($conn,$sql);
        // print_r($user).exit();
        if( mysqli_num_rows($user) > 0){
            $_SESSION['username'] = $username;
            setcookie("username",$_SESSION['username'],time()+300);
            if ( isset($_SESSION['username'])){
                $db = select_one($sql);
                $_SESSION['level'] = $db['level'];
                $level = md5($_SESSION['level']);
                // print_r($_SESSION['level']).exit();
                // setcookie("username",$_SESSION['username'],time()+300);
                setcookie("level",$level,time()+300);
            }
            if($ajax){
                die(json_encode(['success' => 1, 'mes' => 'ok']));
            }
           // echo("Đăng nhập thành công");
            
            $_SESSION['username'] = $username;
            setcookie("username",$_SESSION['username'],time()+300);
        }else{
            $_SESSION["thongbao"] = "Tài khoản hoặc mật khẩu không chính xác";
            if($ajax){
                die(json_encode(['success' => false, 'mes' => $_SESSION["thongbao"]]));
            }else{
                header("location:login.php");
            }
        
        }
        // $_SESSION['username'] = $username;
        

    }else{
        $_SESSION["thongbao"] = "Vui lòng nhập tài khoản và mật khẩu";
    //    header("location:login.php");
    }

    // header('location:admin.php');

    if( isset($_POST['submit-dangky'])){
    //   header("location:register.php");
    }
?>