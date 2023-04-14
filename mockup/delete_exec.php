<?php
	include("lib_db.php");
	//get input
	$id = isset($_REQUEST["id"]) ? $_REQUEST["id"] : 0;
	//tao sql
	$sql = "delete from trangchu  " ;
	$sql .= " WHERE id =$id" ;
	// echo $sql;exit();
	$ret = exec_update($sql);
	header("Location:admin.php");
	// print_r($ret);exit();
?>