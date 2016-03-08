<?php
	//添加专栏模块
	function addRecommend(){
		$uploadFile = uploadFile("../column_pic/");
		$arr = $_POST;
		$arr['r_path'] = $uploadFile[0]['name'];
		if(insert("exam_recommend",$arr)){
			$mes = "添加成功<a href='listRecommend.php'>浏览</a>";
		}else{
			$mes = "添加失败<a href='listRecommend.php'>浏览</a>";
		}
		return $mes;
	}


	//获取专栏信息分页
	function getAllColumnByPage($page,$pageSize=3){
		$sql = "select * from exam_recommend";
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
		$sql = "select * from exam_recommend limit ".$offset.",".$pageSize;
		$rows = fetchAll($sql);
		return $rows;
	}

	//删除栏目
	function delColumn($id,$path){
		if(delete("exam_recommend","r_id=$id")){
			if(unlink("../column_pic/images/".$path)){
				$mes = "文件删除成功<a href='listRecommend.php'>浏览</a>";
			}else{
				$mes = "文件在文件夹中删除不成功<a href='listRecommend.php'>浏览</a>";
			}
		}else{
			$mes = "文件在数据库中删除不成功<a href='listRecommend.php'>浏览</a>";
		}
		return $mes;
	}

	//编辑栏目
	function editColumn($id){
		$uploadFile = uploadFile("../column_pic/");
		$arr = $_POST;
		$arr['r_path'] = $uploadFile[0]['name'];
		if(update("exam_recommend",$arr,"r_id=$id")){
			$mes = "修改成功<a href='listRecommend.php'>浏览</a>";
		}else{
			$mes = "修改失败<a href='listRecommend.php'>浏览</a>";
		}
		return $mes;
	}
?>