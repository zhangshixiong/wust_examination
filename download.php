<?php
	require_once('./include.php');
	
	$filename = $_GET['filename'];
	$realName = explode('_', $filename);

	//下载次数每次加一
	$sql = "update exam_file set f_dltimes = f_dltimes+'1' where f_id=".$_GET['f_id'];
	mysql_query($sql);

	//自己起的名字
		header("content-disposition:attachment;filename=".$realName[2]);
		header("content-length:".filesize($filename));

	ob_clean();
	flush();
	//真实的文件
	readfile($filename);
?>