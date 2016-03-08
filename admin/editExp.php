<?php
	require_once("../include.php");
	$e_id = $_REQUEST['id'];
	$sql = "select * from exam_exp where e_id=".$e_id;
	$row = fetchOne($sql);
?>
<br /><br />
<form method="post" action="doAdminAction.php?act=editExp&id=<?php echo $e_id;?>">
	<h3>编辑经验</h3>
	<table width="70%" border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
		<tr>
			<td>用户名：</td>
			<td><input type="text" name="m_username" value="<?php echo $row['e_username'];?>"></td>
		</tr>
		<tr>
			<td>分享内容:</td>
			<td>
				<textarea cols="80" rows="5" name="m_content" ><?php echo $row['e_content'];?></textarea>
			</td>
		</tr>
		<tr>
			<td>分享时间:</td>
			<td>
				<input type="text" name="m_time" value="<?php echo $row['e_time'];?>">
			</td>
		</tr>
		<tr>
			<td colspan="2"><input type="submit" value="提交"/></td>
		</tr>
	</table>
</form>