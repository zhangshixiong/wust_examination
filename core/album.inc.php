<?php
	
	//添加图片
	function addAlbum($arr){
		insert("imooc_album",$arr);
	}

	//添加水印图片
	function doWaterPic($id){
		$rows = getImgByProId($id);
		foreach ($rows as $row) {
			$filename = "../admin/uploads/".$row['album_Path'];
			waterPic($filename);
		}
		$mes = "添加水印图片成功.返回列表查看，<a href='listProImages.php'>返回查看</a>";
		return $mes;
	}

	//添加水印文字
	function doWaterText($id){
		$rows = getImgByProId($id);
		foreach ($rows as $row) {
			$filename = "../admin/uploads/".$row['album_Path'];
			waterText($filename);
		}
		$mes = "添加水印文字成功.返回列表查看，<a href='listProImages.php'>返回查看</a>";
		return $mes;
	}
?>