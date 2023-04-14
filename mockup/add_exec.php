<?php
    session_start();
	//print_r($_GET);
	//print_r($_POST);
	//print_r($_REQUEST);exit();
	//echo "Ban dang dinh them ban ghi";exit();
	include("lib_db.php");
	include("suanh.php");
	//print_r($_FILES);exit();
	//if( isset($_POST['btn-add'])) {
        $data = array();
        $cid = isset($_REQUEST["cid"]) ? $_REQUEST["cid"] : 0;
        $img = upload_file_by_name("img");
        // echo "img=[{$img}]";exit();
        $cardname = isset($_REQUEST["cardname"]) ? $_REQUEST["cardname"] : "";
        $cardprice = isset($_REQUEST["cardprice"]) ? $_REQUEST["cardprice"] : "";
        $currentprice = isset($_REQUEST["currentprice"]) ? $_REQUEST["currentprice"] : "";
        $currentsaleoff = isset($_REQUEST["currentsaleoff"]) ? $_REQUEST["currentsaleoff"] : "";
        
        $data["cid"] = $cid;
        $data["img"] = $img;
        $data["cardname"] = $cardname;
        $data["cardprice"] = $cardprice;
        $data["currentprice"] = $currentprice;
        $data["currentsaleoff"] = $currentsaleoff;
        $tbl = "trangchu";
        $sql = data_to_sql_insert($tbl, $data);
        // print_r($data).exit();
        // print_r($sql);exit();
        $ret = exec_update($sql);
	    // print_r($ret);exit();
        if($ret == 1){
            $_SESSION["thongbao"] = "Bạn đã thêm thành công";
		    header('location:add.php');
            
        }
    //}
?>

