<?php
	
	


function upload_file_by_name($name, $target_dir=""){
	$sq= "SELECT * FROM trangchu";
    $c = select_list($sq);
    $last = end($c);
    // print_r($last).die('ok');
    $dem = $last['id'] + 1;
    // print_r($dem).die('ok');

	//print("upload_file_by_name->name=[{$name}]");
	if (!isset($_FILES[$name])){
		//print("upload_file_by_name->name=[{$name}], khong co file");
		return "";
	}
	if ( isset($_FILES[$name])){
		$link = "images/sanpham/sp"."{$dem}"."/";
		if (!is_dir($link)){
			mkdir($link);
		}
	}

	$links = "images/sanpham/sp"."{$dem}";


	// print_r($dem);
	if (!$target_dir){		
		$target_dir = "$link";
	}
	//print("upload_file_by_name->target_dir=[{$target_dir}]");
	$fdata = $_FILES[$name];
	//print_r($fdata);
	$ext = strtolower(pathinfo($fdata["name"],PATHINFO_EXTENSION));
	$target_file = $target_dir . basename($fdata["name"],".{$ext}") . ".webp";
	// print_r($target_file).die('ok');
	//print("upload_file_by_name->target_file=[{$target_file}]");
	//print("upload_file_by_name->ext=[{$ext}]");
	if (!is_dir($target_dir)){
		mkdir($target_dir);
	}
	if (move_uploaded_file($fdata["tmp_name"], $target_file)) {
		return $links;
		
	}
	return "";
}
