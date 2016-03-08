<?php
//公告核心模块
	//添加公告
	function addShow(){
		$arr = $_POST;
		$arr['s_time'] = time();
		if(insert("exam_show",$arr)){
			$mes = "添加公告成功<a href='listShow.php'>查看公告</a>";
		}else{
			$mes = "添加公告失败<a href='listShow.php'>查看公告</a>";
		}
		return $mes;
	}

	//编辑公告
	function editShow($id){
		$arr = $_POST;
		$arr['s_time'] = time();
		if(update("exam_show",$arr,"s_id = $id")){
			$mes = "编辑公告成功<a href='listShow.php'>查看公告</a>";
		}else{
			$mes = "编辑公告成功<a href='listShow.php'>查看公告</a>";
		}
		return $mes;
	}

	//删除公告
	function delShow($id){
		if(delete("exam_show","s_id = $id")){
			$mes = "删除公告成功<a href='listShow.php'>查看公告</a>";
		}else{
			$mes = "删除公告失败<a href='listShow.php'>查看公告</a>";
		}
		return $mes;
	}

	//获取公告信息分页
	function getAllShowByPage($page,$pageSize=3){
		$sql = "select * from exam_show";
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
		$sql = "select * from exam_show limit ".$offset.",".$pageSize;
		$rows = fetchAll($sql);
		return $rows;
	}
?>