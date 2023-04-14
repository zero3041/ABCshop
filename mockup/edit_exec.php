<?php
    include("lib_db.php");
	include("suanh.php");
	//print_r($_FILES);exit();
	//if( isset($_POST['btn-add'])) {
    $data = array();
    $id = isset($_REQUEST["id"]) ? $_REQUEST["id"] : 0;
    // print_r($id).die('ok');
    $cid = isset($_REQUEST["cid"]) ? $_REQUEST["cid"] : 0;
    $img = upload_file_by_name("img");
    //echo "img=[{$img}]";exit();
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
    $cond = "id={$id}";
    //print_r($cond).exit();
    //print_r($data).die('ok');
    $sql = data_to_sql_update($tbl,$data,$cond);
    // print_r($sql);exit();
    $ret = exec_update($sql);
    header("location:admin.php");
?>