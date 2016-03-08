<?php
	require_once("../include.php");
	$id = $_REQUEST['id'];
	$sql = "select * from exam_admin where a_id=".$id;
	var_dump($sql);
	$row = fetchOne($sql);
	var_dump($row);
?>

<html>
	<h3>编辑管理员</h3>
	<form method="post" action="doAdminAction.php?act=editAdmin&id=<?php echo $row['a_id']; ?>">
		<table width="70%" border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
			<tr>
				<td>管理员名称</td>
				<td><input type="text" name="a_username" value="<?php echo $row['a_username'] ;?>" /></td>
			</tr>
			<tr>
				<td>管理员密码</td>
				<td><input type="password" name="a_password" value="<?php echo $row['a_password'] ;?>" /></td>
			</tr>
			<tr>
				<td>管理员邮箱</td>
				<td><input type="text" name="a_email" value="<?php echo $row['a_email'] ;?>" /></td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" value="编辑管理员" /></td>
			</tr>
		</table>
	</form>
</html>