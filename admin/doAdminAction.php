<?php
	require_once("../include.php");
	checkLogined();
	$act = $_REQUEST['act'];

	if($act == "logout"){
		logout();
	}else if($act == "addAdmin"){
		$mes = addAdmin();	
	}else if($act == "editAdmin"){
		$id = $_REQUEST['id'];
		$mes = editAdmin($id);
	}else if($act == "delAdmin"){
		$id = $_REQUEST['id'];
		$mes = delAdmin($id);
	}else if($act == "addCate"){
		$mes = addCate();
	}else if($act == "delCate"){
		$id = $_REQUEST['id'];
		$mes = delCate($id);
	}else if($act == "editCate"){
		$id = $_REQUEST['id'];
		$mes = editCate($id);
	}else if($act =="addPro"){
		$mes = addPro();
	}else if($act == "editPro"){
		$id = $_REQUEST['id'];
		$mes = editPro($id);
	}else if($act == "delPro"){
		$id = $_REQUEST['id'];
		$mes = delPro($id);
	}else if($act == "addUser"){
		$mes = addUser();
	}else if($act == "editUser"){
		$id = $_REQUEST['id'];
		$mes = editUser($id);
	}else if($act == "delUser"){
		$id = $_REQUEST['id'];
		$mes = delUser($id);
	}else if($act == "waterText"){
		$id = $_REQUEST['id'];
		$mes = doWaterText($id);
	}else if($act == "waterPic"){
		$id = $_REQUEST['id'];
		$mes = doWaterPic($id);
	}else if($act == "upload_file"){
		$mes = upload_file();
	}else if($act == "delFile"){
		$id = $_REQUEST['id'];
		$f_path = $_REQUEST['f_path'];
		$mes = delFile($id,$f_path);
	}else if($act == "addMessage"){
		$mes = addMessage();
	}else if($act == "editMessage"){
		$id = $_REQUEST['id'];
		$mes = editMessage($id);
	}else if($act == "delMessage"){
		$id = $_REQUEST['id'];
		$mes = delMessage($id);
	}else if($act == "addReMessage"){
		$pid = $_REQUEST['pid'];
		$mes = addReMessage($pid);
	}else if($act == "delReMessage"){
		$id = $_REQUEST['id'];
		$mes = delReMessage($id);
	}else if($act == "editReMessage"){
		$id = $_REQUEST['id'];
		$mes = editReMessage($id);
	}else if($act == "addShow"){
		$mes = addShow();
	}else if($act == "delShow"){
		$id = $_REQUEST['id'];
		$mes = delShow($id);
	}else if($act == "editShow"){
		$id = $_REQUEST['id'];
		$mes = editShow($id);
	}else if($act == "addRecommend"){
		$mes = addRecommend();
	}else if($act == "delColumn"){
		$id = $_GET['id'];
		$path = $_GET['path'];
		$mes = delColumn($id,$path);
	}else if($act == "editColumn"){
		$id = $_GET['id'];
		$mes = editColumn($id);
	}else if($act == "addExp"){
		$mes = addExp();
	}else if($act == "editExp"){
		$id = $_GET['id'];
		$mes = editExp($id);
	}else if($act == "delExp"){
		$id = $_GET['id'];
		$mes = delExp($id);
	}else if($act == "addComClass"){
		echo "aaa";
		$mes = addComClass();
	}else if($act == "delComClass"){
		$id = $_REQUEST['id'];
		$mes = delComClass($id);
	}else if($act == "editComClass"){
		$id = $_REQUEST['id'];
		$mes = editComClass($id);
	}else if($act == "addTest"){
		$mes = addTest();
	}else if($act == "delTest"){
		$id = $_REQUEST['id'];
		$mes = delTest($id);
	}else if($act == "editTest"){
		$id = $_REQUEST['id'];
		$mes = editTest($id);
	}else if($act == "addInfo"){
		$mes = addInfo();
	}else if($act == "delInfo"){
		$id = $_REQUEST['id'];
		$mes = delInfo($id);
	}else if($act == "editInfo"){
		$id = $_REQUEST['id'];
		$mes = editInfo($id);
	}
?>

<html>
	<?php
		if($mes){
			echo $mes;
		}
	?>
</html>