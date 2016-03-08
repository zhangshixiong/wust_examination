<?php

//添加栏目
	function addCate(){
		$arr = $_POST;
		var_dump($arr);
		if(insert("exam_classify",$arr)){
			$mes = "添加分类成功<a href='listCate.php'>浏览分类</a>";
		}else{
			$mes = "添加分类失败<a href='addCate.php'>重新添加</a>";
		}
		return $mes;
	}

//删除类别
	function delCate($id){
		if(delete("exam_classify","c_id=$id or c_path like '%$id%'")){
			$mes = "删除成功<a href='listCate.php'>查看列表</a>";
		}else{
			$mes = "删除失败<a href='listCate.php'>重新删除</a>";
		}
		return $mes;
	}

//编辑类别
	function editCate($id){
		$arr = $_POST;
		if(update("exam_classify",$arr,"id=$id")){
			$mes = "修改成功<a href='listCate.php'>查看列表</a>";
		}else{
			$mes = "修改失败<a href='listCate.php'>重新修改</a>";
		}
		return $mes;
	}

//获取分类信息分页
	function getAllCateByPage($page,$pageSize=3){
		$sql = "select * from exam_classify";
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
		$sql = "select * from exam_classify limit ".$offset.",".$pageSize;
		$rows = fetchAll($sql);
		return $rows;
	}

//获取分类无限信息分页
	function getAllCateByInfo($page,$pageSize=3,$pid){
		$sql = "select * from exam_classify where c_pid=".$pid;
		global $totalRows1;
		$totalRows1 = getResultNum($sql);
		global $totalPage1;
		$totalPage1 = ceil($totalRows1/$pageSize);
		if($page<1 || !is_numeric($page) || $page==null){
			$page = 1;
		}
		if($page>$totalPage1){
			if($totalPage1 == 0){
				exit("该目录下没有分类");
			}
			$page = $totalPage1;	
		}
		$offset = ($page-1)*$pageSize;
		$sql = "select * from exam_classify where c_pid=".$pid." limit $offset,$pageSize";
		$rows = fetchAll($sql);
		return $rows;
	}

//得到所有的分类
	function getAllCate(){
		$sql = "select * from exam_classify";
		$rows = fetchAll($sql);
		return $rows;
	}
?>