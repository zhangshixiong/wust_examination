<?php
	header("content-type:text/html;charset=utf-8");

	//输出消息并跳转
	function alertMes($mes,$url){
		echo "<script>alert('".$mes."');</script>";
		echo "<script>window.location='".$url."';</script>";
	}

	//转换字节
	function transByte($size){
		$type = array("B","KB","MB","GB","TB");
		$i = 0;
		while ($size > 1024) {
			$i++;
			$size/=1024;
		}
		return round($size,2)." ".$type[$i];
	}
?>