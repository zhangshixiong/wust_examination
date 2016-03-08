<?php
	session_start();
	header("content-type:text/html;charset:utf-8");
	define("ROOT",dirname(__FILE__));          //魔术常量__FILE__
	set_include_path(".".PATH_SEPARATOR.ROOT."/lib".PATH_SEPARATOR.ROOT."./core".PATH_SEPARATOR.ROOT."./configs".PATH_SEPARATOR.get_include_path());
	require_once("image.func.php");
	require_once("string.func.php");
	require_once("mysql.func.php");
	require_once("common.func.php");
	require_once("page.func.php");
	require_once("config.php");
	require_once("admin.inc.php");
	require_once("cate.inc.php");
	require_once("pro.inc.php");
	require_once("upload.func.php");
	require_once("album.inc.php");
	require_once("user.inc.php");
	require_once("file.inc.php");
	require_once("message.inc.php");
	require_once("show.inc.php");
	require_once("recommend.inc.php");
	require_once("exp.inc.php");
	require_once("comclass.inc.php");
	require_once("test.inc.php");
	require_once("info.inc.php");
	connect();
?>