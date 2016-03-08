<?php
	require_once("../include.php");
	$m_id = $_REQUEST['id'];
	$sql = "select * from exam_message where m_id=".$m_id;
	$row = fetchOne($sql);
?>
<br /><br />
<form method="post" action="doAdminAction.php?act=editMessage&id=<?php echo $m_id;?>">
	<h3>添加留言</h3>
	<table width="60%" border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
		<tr>
			<td>用户名：</td>
			<td><input type="text" name="m_username" value="<?php echo $row['m_username'];?>"></td>
		</tr>
		<tr>
			<td>留言内容:</td>
			<td>
				<textarea cols="30" rows="5" name="m_content" ><?php echo $row['m_content'];?></textarea>
			</td>
		</tr>
		<tr>
			<td>留言时间:</td>
			<td>
				<input type="text" name="m_time" value="<?php echo $row['m_time'];?>">
			</td>
		</tr>
		<tr>
			<td colspan="2"><input type="submit" value="提交"/></td>
		</tr>
	</table>
</form>