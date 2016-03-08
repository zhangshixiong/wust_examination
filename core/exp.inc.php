<?php
	//添加经验
	function addExp(){
		$arr = $_POST;
		$arr['e_time'] = time();
		if(insert("exam_exp",$arr)){
			$mes = "添加成功<a href='listExp.php'>浏览</a>";
		}else{
			$mes = "添加成功<a href='listExp.php'>浏览</a>";
		}
		return $mes;
	}

	//通过分页得到所有的经验
	function getAllExpByPage($page,$pageSize){
		$sql = "select * from exam_exp";
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
		$sql = "select * from exam_exp limit ".$offset.",".$pageSize;
		$rows = fetchAll($sql);
		return $rows;

	}

//编辑留言
	function editExp($id){
		$arr = $_POST;
		$arr['m_time'] = time();
		if(update("exam_exp",$arr,"e_id = $id")){
			$mes = "编辑经验成功<a href='listExp.php'>查看留言</a>";
		}else{
			$mes = "编辑经验失败<a href='listExp.php.php'>查看留言</a>";
		}
		return $mes;
	}

//删除留言
	function delExp($id){
		if(delete("exam_exp","e_id=$id")){
			$mes = "删除经验成功<a href='listExp.php'>查看留言</a>";
		}else{
			$mes = "删除经验失败<a href='listExp.php'>查看留言</a>";
		}
		return $mes;
	}
?>