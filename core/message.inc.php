<?php

//添加留言
	function addMessage(){
		$arr = $_POST;
		$arr['m_time'] = time();
		if(insert("exam_message",$arr)){
			$mes = "添加留言成功<a href='listMessage.php'>查看留言</a>||<a href='addMessage.php'>再次添加留言</a>";
		}else{
			$mes = "添加留言失败<a href='listMessage.php'>查看留言</a>||<a href='addMessage.php'>再次添加留言</a>";
		}
		return $mes;
	}


	//用户留言
	function addFrontMes(){
		$arr = $_POST;
		$arr['m_content'] = addslashes($arr['m_content']);
		$arr['m_username'] = $_SESSION['username'];
		if($_SESSION['verify'] != $arr['verify']){
			echo "<script>alert('验证码填写错误!重新留言');history.go(-1);</script>";
		}
		unset($arr['verify']);
		$arr['m_time'] = time();
		if(insert("exam_message",$arr)){
			echo "<script>alert('添加留言成功');window.location='message.php';</script>";
		}else{
			echo "<script>alert('添加留言失败');window.location='message.php';</script>";
		}
	}

//通过分页得到所有的留言
	function getAllMessageByPage($page,$pageSize){
		$sql = "select * from exam_message";
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
		$sql = "select * from exam_message limit ".$offset.",".$pageSize;
		$rows = fetchAll($sql);
		return $rows;

	}

//编辑留言
	function editMessage($id){
		$arr = $_POST;
		$arr['m_time'] = time();
		if(update("exam_message",$arr,"m_id = $id")){
			$mes = "编辑留言成功<a href='listMessage.php'>查看留言</a>";
		}else{
			$mes = "编辑留言失败<a href='listMessage.php'>查看留言</a>";
		}
		return $mes;
	}

//删除留言
	function delMessage($id){
		if(delete("exam_message","m_id=$id")){
			$mes = "删除留言成功<a href='listMessage.php'>查看留言</a>";
		}else{
			$mes = "删除留言失败<a href='listMessage.php'>查看留言</a>";
		}
		return $mes;
	}

//添加回复留言
	function addReMessage($pid){
		$arr = $_POST;
		$arr['r_time'] = time();
		$arr['r_pid'] = $pid;
		if(insert("exam_remessage",$arr)){
			$mes = "添加回复留言成功<a href='listReMessage.php'>浏览回复留言列表</a>";
		}else{
			$mes = "添加回复留言失败<a href='listReMessage.php'>浏览回复留言列表</a>";
		}
		return $mes;
	}

//用户添加回复留言
	 function addFrontReMes($r_pid){
	 	$arr = $_POST;
		$arr['r_time'] = time();
		$arr['r_username'] = $_SESSION['username'];
		$arr['r_pid'] = $r_pid;
		
		unset($arr['verify']);
		
		if(insert("exam_remessage",$arr)){
			echo "<script>alert('添加回复留言成功!');window.location='remessage.php?m_id=".$r_pid."';</script>";
		}else{
			echo "<script>alert('添加回复留言失败!');window.location='remessage.php?m_id=".$r_pid."';</script>";
		}
		
	 }

//删除回复留言
	function delReMessage($id){
		if(delete("exam_remessage","r_id = $id")){
			$mes = "删除回复留言成功<a href='listReMessage.php'>浏览回复留言列表</a>";
		}else{
			$mes = "删除回复留言失败<a href='listReMessage.php'>浏览回复留言列表</a>";
		}
		return $mes;
	}

//通过分页得到所有的回复留言
	function getAllReMessageByPage($page,$pageSize){
		$sql = "select * from exam_remessage";
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
		$sql = "select * from exam_remessage limit ".$offset.",".$pageSize;
		$rows = fetchAll($sql);
		return $rows;

	}

//编辑回复留言
	function editReMessage($id){
		$arr = $_POST;
		$arr['r_time'] = time();
		if(update("exam_remessage",$arr,"r_id = $id")){
			$mes = "编辑留言成功<a href='listReMessage.php'>查看回复留言</a>";
		}else{
			$mes = "编辑留言失败<a href='listReMessage.php'>查看回复留言</a>";
		}
		return $mes;
	}

?>