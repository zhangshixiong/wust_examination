<?php

//链接数据库
	function connect(){
		$link = mysql_connect(DB_HOST,DB_USER,DB_PWD) or die("数据库连接失败".mysql_errno().":".mysql_error());
		mysql_select_db(DB_DBNAME,$link) or die("数据库选择失败");
		mysql_set_charset(DB_CHARSET);
		return $link;
	}

//完成记录插入的操作
	function insert($table,$array){
		$keys = join(',',array_keys($array));
		$values = "'".join("','",array_values($array))."'";
		$sql = "insert into ".$table." ($keys) values (".$values.")";
		//var_dump($sql);
		mysql_query($sql);
		return mysql_insert_id();
	}

//完成更新插入
//update table set username='king' where id=1;
	function update($table,$array,$where){
		$str = '';
		foreach ($array as $key => $value) {
			if($str == null){
				$sep="";
			}else{
				$sep=",";
			}
			$str.=$sep.$key."='".$value."'";
		}
		$sql = "update ".$table." set ".$str.($where == null?null:" where ".$where);
		mysql_query($sql);
		return mysql_affected_rows();
	}

//删除记录
	function delete($table,$where){
		$where = $where==null?null:" where ".$where;
		$sql = "delete from ".$table.$where;
		var_dump($sql);
		mysql_query($sql);
		return mysql_affected_rows();
	}

//得到一条记录
	function fetchOne($sql){
		$result = mysql_query($sql);
		$row = mysql_fetch_assoc($result);
		return $row;
	}

//得到所有常量
	function fetchAll($sql){
		$result = mysql_query($sql);
		while($row = mysql_fetch_assoc($result)){
			$rows[] = $row;
		}
		return isset($rows)?$rows:'';
	}

//返回记录的条数
	function getResultNum($sql){
		$result = mysql_query($sql);
		return mysql_num_rows($result);
	}

//得到刚到的记录
	function getInsertId(){
		return mysql_insert_id();
	}

?>