<?php
	if(isset($_GET['e_id'])){
		require_once("../include.php");
		echo "<h2>详细内容</h2>";
		echo "<table width='70%' border='1'cellpadding='5' cellspacing='0' bgcolor='#cccccc'>";
		$sql = "select * from exam_exp where e_id=".$_GET['e_id'];
		$row = fetchOne($sql);
		echo "<tr><td>标题：&nbsp;&nbsp; </td><td>".$row['e_title']."</td></tr>";
		echo "<tr><td>内容：&nbsp;&nbsp;</td><td><textarea readonly='readonly' cols='80' rows='9'>".$row['e_content']."</textarea></td>";
		echo "<tr><td>用户名：&nbsp;&nbsp;</td><td>".$row['e_username']."</td></tr>";
		echo "</table>";
	}
?>