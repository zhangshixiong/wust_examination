<?php
	header("content-type:text/html;charset=utf8");

	function buildInfo(){
		if(!$_FILES){
			return ;
		}
		$i = 0;
		foreach($_FILES as $v){
			if(is_string($v['name'])){
				$file[$i] = $v;
				$i++;
			}else{
				foreach ($v['name'] as $key => $val) {
					$file[$i]['name'] = $val;
					$file[$i]['size'] = $v['size'][$key];
					$file[$i]['tmp_name'] = $v['tmp_name'][$key];
					$file[$i]['type'] = $v['type'][$key];
					$file[$i]['error'] = $v['error'][$key];
					$i++;
				}
			}
		}
		return $file;
	}

	function uploadFile($path = "uploads/",$maxSize = "100000000",$allowext = array("jpeg","jpg","png","txt","doc","ppt","xls","docx","pptx")){
		$i=0;
		if(!file_exists($path)){
			mkdir($path,0777,true);
		}
		$fileinfos = buildInfo();
		if(!($fileinfos && is_array($fileinfos))){
			return ;
		}

		foreach ($fileinfos as $fileinfo) {
			if($fileinfo['error'] == 0){
				$ext = getExt($fileinfo['name']);
				$front = getFront($fileinfo['name']);

				if(!in_array($ext, $allowext)){
					exit("文件非法");
				}
				if($fileinfo['size'] > $maxSize){
					exit("文件太大");
				}

				$filename = getUniName()."_".$front.".".$ext;
				switch ($ext) {
					case 'txt':
						$destination = $path."txt/".$filename;
						break;

					case 'docx':
						$destination = $path."word/".$filename;
						break;

					case 'doc':
						$destination = $path."word/".$filename;
						break;

					case 'ppt':
						$destination = $path."ppt/".$filename;
						break;

					case 'pptx':
						$destination = $path."ppt/".$filename;
						break;


					case 'xls':
						$destination = $path."xls/".$filename;
						break;
					
					default:
						$destination = $path."images/".$filename;	
						break;
				}

				if(is_uploaded_file($fileinfo['tmp_name'])){
					if(move_uploaded_file($fileinfo['tmp_name'], $destination)){
						$fileinfo['name']=$filename;
						unset($fileinfo['tmp_name'],$fileinfo['size'],$fileinfo['type']);
						$uploadedFiles[$i]=$fileinfo;
						$i++;
					}else{
						exit("文件移动失败");
					}
				}else{
					exit("文件不是通过http_post上传");
				}
			}else{
				switch ($fileinfo['error']) {
					case '1':
						$mes = "超过了配置文件上传大小";
						break;
					
					case '2':
						$mes = "超过了表单设置上传大小";
						break;

					case '3':
						$mes = "文件部分被上传";
						break;

					case '4':
						$mes = "没有文件被上传";
						break;

					case '6':
						$mes = "没有找到临时目录";
						break;	

					case '7':
						$mes = "文件不可写";
						break;	

					case '8':
						$mes = "扩展php的程序中断了文件上传";
						break;	
				}
				echo $mes;
			}	
		}	
		return $uploadedFiles;
	}
?>