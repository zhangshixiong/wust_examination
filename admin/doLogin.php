<?php
//用户登录页面
	require_once("../include.php");

	$username = $_POST['a_username'];
	$password = $_POST['a_password'];
	$verify = $_POST['verify'];
	$verify1 = $_SESSION['verify'];
	$autoFlag = isset($_POST['autoFlag']);

	if($verify1 == $verify){
		$username = addslashes($username);
		$sql = "select * from exam_admin where a_username='".$username."' and a_password='".$password."'";
		var_dump($sql);
		$row = checkAdmin($sql);
		var_dump($row);
		if($row){
			if($autoFlag){
				setcookie('admin_name',$row['a_username'],time()+7*24*3600);
				setcookie('admin_id',$row['a_id'],time()+7*24*3600);
			}
			$_SESSION['admin_name'] = $row['a_username'];
			$_SESSION['admin_id'] = $row['a_id'];
			alertMes("登陆成功","index.php");
		}else{
			alertMes("用户信息错误，重新登陆","login.php");
		}
	}else{
		alertMes("验证码错误，重新登陆","login.php");
	}
?>