<html>
	<meta charset="utf-8">
	<h3>添加分类</h3>
	<form action="doAdminAction.php?act=addCate" method="post">
		<input type="hidden" name="c_pid" value="<?php echo isset($_GET['c_pid']) ? $_GET['c_pid'] : 0 ; ?>" />
		<input type="hidden" name="c_path" value="<?php echo isset($_GET['c_path']) ? $_GET['c_path'] : '0,'?>">
		<table width="70%" border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
			<tr>
				<td>父类别：</td>
				<td><?php echo isset($_GET['c_name']) ? $_GET['c_name'] : "根类别" ; ?></td>
			</tr>
			<tr>
				<td>添加子类别：</td>
				<td><input type="text" name="c_name" /></td>
			</tr>
			<tr>
				<td><input type="submit" value="提交" /></td>
				<td><input type="reset" value="重置" /></td>
			</tr>
		</table>
	</form>
</html>