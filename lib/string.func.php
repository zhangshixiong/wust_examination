<?php

//生成任意的字符串
	function buildRandomString($type = 3,$length = 4){
		if($type = 1){
			$chars = join("",range(0,9));
		}else if($type = 2){
			$chars = join("",array_merge(range('a','z'),range('A','Z')));
		}else if($type = 3){
			$chars = join("",array_merge(range('a','z'),range('A','Z'),range(0,9)));
		}
		if($length > strlen($chars)){
			exit("验证码长度不够");
		}
		$chars = str_shuffle($chars);
		return substr($chars,0,$length);
	}

//唯一字符串
	function getUniName(){
		return md5(uniqid(microtime(),true));
	}

//取出文件扩展名
	function getExt($filename){
		return strtolower(end(explode('.', $filename)));
	}

//取出文件名
	function getFront($filename){
		return strtolower(reset(explode('.', $filename)));
	}
?>