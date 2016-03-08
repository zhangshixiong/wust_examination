<?php
//添加商品
	function addPro(){
		$arr = $_POST;
		$arr['pubTime'] = time();
		$path = "./uploads/";
		$upLoadFiles = upLoadFile($path);
		if(is_array($upLoadFiles) && $upLoadFiles){
			foreach ($upLoadFiles as $key=>$upLoadFile) {
				thumb($path.$upLoadFile['name'],"../image_50/".$upLoadFile['name'],50,50);
				thumb($path.$upLoadFile['name'],"../image_220/".$upLoadFile['name'],220,220);
				thumb($path.$upLoadFile['name'],"../image_350/".$upLoadFile['name'],350,350);
				thumb($path.$upLoadFile['name'],"../image_800/".$upLoadFile['name'],800,800);
			}
		}
		$res = insert("imooc_pro",$arr);
		$pid = getInsertId();
		if($res && $pid){
			foreach ($upLoadFiles as $key => $upLoadFile) {
				$arr1['pid'] = $pid;
				$arr1['album_Path'] = $upLoadFile['name'];
				addAlbum($arr1);
			}
			$mes = "添加成功<a href='addPro.php' target='mainFrame'>再次添加</a><a href='listPro.php' target='mainFrame'>查看列表</a>";
		}else{
			foreach ($upLoadFiles as $key => $upLoadFile) {
				if(file_exists("../image_50/".$upLoadFile['name'])){
					unlink("../image_50/".$upLoadFile['name']);
				}
				if(file_exists("../image_350/".$upLoadFile['name'])){
					unlink("../image_350/".$upLoadFile['name']);
				}
				if(file_exists("../image_220/".$upLoadFile['name'])){
					unlink("../image_220/".$upLoadFile['name']);
				}
			}
			$mes = "添加失败<a href='listPro.php' target='mainFrame'>查看列表</a>";
		}
		return $mes;
	}

//得到所有商品
	 function getAllPro(){
	 	$sql = "select * from imooc_pro";
		$rows = fetchAll($sql);
		return $rows;
	 }

//得到所有商品
	function getAllProByAdmin(){
		$sql = "select p.id,p.pName,p.pSn,p.pNum,p.mPrice,p.iPrice,p.pDesc,p.pubTime,p.isShow,p.isHot,c.cName from imooc_pro as p join imooc_cate c on p.cId=c.id";
		$rows = fetchAll($sql);
		return $rows;
	}


	function getImgByProId($id){
		$sql = "select album_Path from imooc_album where pid=".$id;
		$rows = fetchAll($sql);
		return $rows;
	}

	function getProById($id){
		$sql = "select p.id,p.pName,p.pSn,p.pNum,p.mPrice,p.iPrice,p.pDesc,p.pubTime,p.isShow,p.isHot,c.cName,p.cId from imooc_pro as p join imooc_cate c on p.cId=c.id where p.id=".$id;
		$row = fetchOne($sql);
		return $row;
	}

	function editPro($id){
		$where="id=".$id;
		$arr = $_POST;
		$arr['pubTime'] = time();
		$path = "./uploads/";
		$upLoadFiles = upLoadFile($path);
		if(is_array($upLoadFiles) && $upLoadFiles){
			foreach ($upLoadFiles as $key=>$upLoadFile) {
				thumb($path.$upLoadFile['name'],"../image_50/".$upLoadFile['name'],50,50);
				thumb($path.$upLoadFile['name'],"../image_220/".$upLoadFile['name'],220,220);
				thumb($path.$upLoadFile['name'],"../image_350/".$upLoadFile['name'],350,350);
				thumb($path.$upLoadFile['name'],"../image_800/".$upLoadFile['name'],800,800);
			}
		}
		$res = update("imooc_pro",$arr,$where);
		$pid = $id;
		if($res && $pid){
			if(is_array($upLoadFiles) && $upLoadFiles){
				foreach ($upLoadFiles as $key => $upLoadFile) {
					$arr1['pid'] = $pid;
					$arr1['album_Path'] = $upLoadFile['name'];
					addAlbum($arr1);
				}
			}
			$mes = "编辑成功<a href='listPro.php' target='mainFrame'>查看列表</a>";
		}else{
			if(is_array($upLoadFiles) && $upLoadFiles){
				foreach ($upLoadFiles as $key => $upLoadFile) {
					if(file_exists("../image_50/".$upLoadFile['name'])){
						unlink("../image_50/".$upLoadFile['name']);
					}
					if(file_exists("../image_350/".$upLoadFile['name'])){
						unlink("../image_350/".$upLoadFile['name']);
					}
					if(file_exists("../image_220/".$upLoadFile['name'])){
						unlink("../image_220/".$upLoadFile['name']);
					}
				}
			}
			$mes = "编辑失败<a href='listPro.php' target='mainFrame'>查看列表</a>";
		}
		return $mes;
	}

//删除页面
	function delPro($id){
		$where = "id = ".$id;
		if(delete("imooc_pro",$where)){
			$mes = "删除成功<a href='listPro.php'>浏览列表</a>";
		}else{
			$mes = "删除失败<a href='listPro.php'>删除列表</a>";
		}
		return $mes;
	}


//得到商品部分信息
	function getProInfo($sql){
		$rows = fetchAll($sql);
		return $rows;
	}
?>