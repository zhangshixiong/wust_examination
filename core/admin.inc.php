<?php
//检查用户是否存在
	function checkAdmin($sql){
		return fetchOne($sql);
	}

// 检查用户是否非法登陆
	function checkLogined(){
		if(!isset($_SESSION["admin_id"]) && !isset($_COOKIE["admin_id"])){
			alertMes("请先登录","login.php");
		}
	}

//管理员退出页面
	function logout(){
		$_SESSION = array();
		if(isset($_COOKIE[session_name()])){
			setcookie(session_name,"",time()-1);
		}
		if(isset($_COOKIE['admin_id'])){
			setcookie('admin_id',"",time()-1);
		}
		if(isset($_COOKIE['admin_name'])){
			setcookie('admin_name',"",time()-1);
		}
		session_destroy();
		header("location:login.php");
	}

//添加管理员函数
	function addAdmin(){
		$arr = $_POST;
		if(insert("exam_admin",$arr)){
			$mes = "添加成功"."<a href='addAdmin.php'>继续添加</a>||<a href='listAdmin.php'>浏览管理员列表</a>";
		}else{
			$mes = "添加失败"."<a href='addAdmin.php'>重新添加</a>";
		}
		return $mes;
	}

//得到所有管理员记录
	function getAllAdmin(){
		$sql = "select * from exam_admin";
		$rows = fetchAll($sql);
		return $rows;
	}

//编辑管理员
	function editAdmin($id){
		$arr = $_POST;
		if(update("exam_admin",$arr, "a_id = $id")){
			$mes = "修改成功<a href='listAdmin.php'>返回管理员列表</a>";
		}else{
			$mes = "修改失败<a href='listAdmin.php'>返回管理员列表</a>";
		}
		return $mes;
	}

//删除管理员
	function delAdmin($id){
		if(delete("imooc_admin","id=$id")){
			$mes = "删除成功<a href='listAdmin.php'>返回查看</a>";
		}else{
			$mes = "删除失败<a href='listAdmin.php'>重新删除</a>";
		}
		return $mes;
	}

//得到分页管理信息
	function getAllAdminByPage($page,$pageSize=3){
		$sql = "select * from exam_admin";
		global $totalRows;
		$totalRows = getResultNum($sql);
	    global $totalPage;
	    $totalPage = ceil($totalRows/$pageSize);
	    if($page<1 || !is_numeric($page) || $page==null){
	        $page = 1;
	    }
	    if($page>$totalPage){
	        $page = $totalPage;
	    }
	    $offset = ($page-1)*$pageSize;
	    $sql = "select * from exam_admin limit ".$offset.",".$pageSize;
	    $rows = fetchAll($sql);
	    return $rows;
	}

//添加用户
	function addUser(){
		$arr = $_POST;
		$arr['u_regTime'] = time();
		$upLoadFile = uploadFile("../uploads_face/");

		if($upLoadFile && is_array($upLoadFile)){
			$arr['u_face'] = $upLoadFile['0']['name'];
		}else{
			$mes = "上传头像失败";
		}

		if(insert("exam_user",$arr)){
			$mes = "添加成功<a href='listUser.php'>查看用户列表</a>";
		}else{
			$filename = "../uploads_face/".$upLoadFile['0']['name'];
			if(file_exists($filename)){
				unlink($filename);
			}
			$mes = "添加失败<a href='addUser.php'>重新添加</a>";
		}
		return $mes;
	}

		//删除用户
	function delUser($id){
		$where = "id = ".$id;
		$sql = "select face from exam_user where id=".$id;
		$row = fetchOne($sql);
		if(delete("exam_user",$where)){
			if(file_exists("../uploads/".$row['face'])){
				if(unlink("../uploads/".$row['face'])){
					$mes = "删除成功<a href='listUser.php'>查看列表</a>";
				}else{
					$mes = "用户头像删除不成功！<a href='listUser.php'>查看列表</a> ";
				}
			}
		}else{
			$mes = "删除失败<a href='listUser.php'>重新删除</a>";
		}
		return $mes;
	}


	//编辑用户
	function editUser($id){
		$arr = $_POST;
		$where = "u_id = ".$id;
		if(update("exam_user",$arr,$where)){
			$mes = "编辑成功<a href='listUser.php'>查看用户列表</a>";
		}else{
			$mes = "编辑失败<a href='listUser.php'>重新编辑</a>";
		}
		return $mes;
	}


	//得到分页管理信息
	function getAllUserByPage($page,$pageSize=3){
		$sql = "select * from exam_user";
		global $totalRows;
		$totalRows = getResultNum($sql);
	    global $totalPage;
	    $totalPage = ceil($totalRows/$pageSize);
	    if($page<1 || !is_numeric($page) || $page==null){
	        $page = 1;
	    }
	    if($page>$totalPage){
	        $page = $totalPage;
	    }
	    $offset = ($page-1)*$pageSize;
	    $sql = "select * from exam_user limit ".$offset.",".$pageSize;
	    $rows = fetchAll($sql);
	    return $rows;
	}


?>