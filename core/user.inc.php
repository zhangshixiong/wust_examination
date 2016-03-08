<?php
	//用户登录操作
	function doLogin(){
		$username = addslashes($_POST['u_username']);
		$password = $_POST['u_password'];
		$sql = "select * from exam_user where u_username='".$username."' and u_password='".$password."'";
		$row = fetchOne($sql);
		$from = isset($_POST['from'])?$_POST['from']:'index';
		if($row){
			$_SESSION['username'] = $row['u_username'];
			$_SESSION['loginFlag'] = $row['u_id'];
			echo "<script>window.location='".$from.".php';</script>";
		}else{
			alertMes("用户信息不正确，重新登陆","flogin.php");
		}
	}

	//用户退出
	function userOut(){
		$_SESSION = array();
		if(isset($_COOKIE[session_name()])){
			setcookie(session_name(),"",time()-1);
		}
		session_destroy();
		header("location:index.php");
	}

	//用户注册
	function reg(){
		$arr = $_POST;
		$uploadFile = uploadFile("./uploads_face/");
		var_dump($uploadFile);
		$arr['u_regTime'] = time();
		if($uploadFile && is_array($uploadFile)){
			$arr['u_face'] = $uploadFile[0]['name'];
		}else{
			alertMes("头像上传不正确","reg.php");
		}
		if(insert("exam_user",$arr)){
			$id = mysql_insert_id();
			$_SESSION['username'] = $arr['u_username'];
			$_SESSION['loginFlag'] = $id;
			alertMes("注册成功！","index.php");
		}else{
			if(file_exists("./uploads/".$face)){
				unlink("./uploads/".$face);
			}
			alertMes("注册失败！","index.php");
		}
	}

//用户修改信息
	function setUserInfo(){
		$arr = $_POST;
		$sql = "select u_face,u_id from exam_user where u_username='".$_SESSION['username']."'";
		$row = fetchOne($sql);
		if(empty($arr['u_face'])){
			$arr['u_face']=$row['u_face'];
		}
		if(update('exam_user',$arr,' u_id='.$row['u_id'])){
			$_SESSION['username'] = $arr['u_username'];
			echo "<script>alert('修改成功！');location.href='setUserInfo.php';</script>";
		}else{
			echo "<script>alert('修改失败！');location.href='setUserInfo.php';</script></script>";
		}
	}

//标记为已读
	function isread($r_id){
		$sql = "update exam_remessage set r_isread=1 where r_id=".$r_id;
		$result = mysql_query($sql);
		echo "<script>window.location='userMessage.php';</script>";
	}

?>