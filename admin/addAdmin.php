<html>
	<h3>添加管理员</h3>
	<form method="post" action="doAdminAction.php?act=addAdmin">
		<table width="70%" border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
			<tr>
				<td>管理员名称</td>
				<td><input type="text" name="a_username" placeholder="请输入管理员名称" /></td>
			</tr>
			<tr>
				<td>管理员密码</td>
				<td><input type="password" name="a_password" placeholder="请输入管理员密码" /></td>
			</tr>
			<tr>
				<td>管理员邮箱</td>
				<td><input type="text" name="a_email" placeholder="请输入管理员邮箱" /></td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" value="添加管理员" /></td>
			</tr>
		</table>
	</form>
</html>