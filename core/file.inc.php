<?php

//得到所有文件分页
	function getAllFilesByPage($page,$pageSize){
		$sql = "select * from exam_file";
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
		$sql = "select * from exam_file limit ".$offset.",".$pageSize;
		$rows = fetchAll($sql);
		return $rows;
	}

//删除文件
	function delFile($id,$f_path){
		if(delete("exam_file","f_id=$id")){
			if(unlink(".".$f_path)){
				$mes = "删除文件成功";
			}else{
				$mes = "文件夹中文件删除不成功 <a href='listFile.php'>查看</a>";
			}
		}else{
			$mes = "文件数据在数据库中删除不成功 <a href='listFile.php'>查看</a>";
		}
		return $mes;
	}

	//管理员上传文件
	function upload_file(){
		$files = $_FILES;
		$uploadfile = uploadFile("../upload_files/");
		var_dump($uploadfile);
		$arr = explode('.', $uploadfile[0]['name']);
		var_dump($uploadfile[0]['name']);
		switch ($arr[1]) {
			case 'txt':
				$f_path = "./upload_files/txt/".$uploadfile[0]['name'];
				break;

			case 'docx':
				$f_path = "./upload_files/word/".$uploadfile[0]['name'];
				break;

			case 'doc':
				$f_path = "./upload_files/word/".$uploadfile[0]['name'];
				break;

			case 'ppt':
				$f_path = "./upload_files/ppt/".$uploadfile[0]['name'];
				break;

			case 'pptx':
				$f_path = "./upload_files/ppt/".$uploadfile[0]['name'];
				break;
			
			case 'xls':
				$f_path = "./upload_files/xls/".$uploadfile[0]['name'];
				break;
			
			default:
				$f_path = "./upload_files/images/".$uploadfile[0]['name'];
				break;
		}

		$post = $_POST;
		$post['f_path'] = $f_path;
		var_dump($f_path);
		$post['f_time'] = time();
		$post['f_size'] = $files['file']['size'];
		if(insert("exam_file",$post)){
			$mes = "文件上传成功";
		}else{
			$mes = "文件上传失败";
		}
		echo "aaa";
		return $mes;
	}
?>