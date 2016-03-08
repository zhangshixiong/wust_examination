<?php
	require_once("include.php");
	$act = $_GET['act'];
	
	if($act == "doLogin"){
		doLogin();
	}else if($act == "reg"){
		reg();
	}else if($act == "userOut"){
		userOut();
	}else if($act == "upload_file"){
		upload_file();
	}else if($act == "addFrontMes"){
		addFrontMes();
	}else if($act == "addFrontReMes"){
		$r_pid = $_GET['r_pid'];
		addFrontReMes($r_pid);
	}else if($act == "setUserInfo"){
		setUserInfo();
	}else if($act == "isread"){
		$r_id = $_GET['r_id'];
		isread($r_id);
	}
?>