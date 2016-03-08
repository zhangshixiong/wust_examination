<?php

//添加栏目
	function addTest(){
		$arr = $_POST;
		var_dump($arr);
		if(insert("exam_test",$arr)){
			$mes = "添加分类成功<a href='listTest.php'>浏览分类</a>";
		}else{
			$mes = "添加分类失败<a href='addTest.php'>重新添加</a>";
		}
		return $mes;
	}

//删除类别
	function delTest($id){
		if(delete("exam_test","t_id=$id")){
			$mes = "删除成功<a href='listTest.php'>查看列表</a>";
		}else{
			$mes = "删除失败<a href='listTest.php'>重新删除</a>";
		}
		return $mes;
	}


//获取分类信息分页
	function getAllTestByPage($page,$pageSize=3){
		$sql = "select * from exam_test";
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
		$sql = "select * from exam_test limit ".$offset.",".$pageSize;
		$rows = fetchAll($sql);
		return $rows;
	}

?>