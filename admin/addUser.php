<html>
	<h3>添加用户</h3>
	<form method="post" action="doAdminAction.php?act=addUser" enctype="multipart/form-data">
		<table width="70%" border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
			<tr>
				<td>用户名</td>
				<td><input type="text" name="u_username" placeholder="请输入名称" /></td>
			</tr>
			<tr>
				<td>密码</td>
				<td><input type="password" name="u_password" placeholder="请输入密码" /></td>
			</tr>
			<tr>
				<td>邮箱</td>
				<td><input type="text" name="u_email" placeholder="请输入邮箱" /></td>
			</tr>
			<tr>
				<td>性别</td>
				<td>
					<input type="radio" name="u_sex" value="1"/>男
					<input type="radio" name="u_sex" value="2"/>女
					<input type="radio" name="u_sex" value="3" checked/>保密
				</td>
			</tr>
			<tr>
				<td>上传头像</td>
				<td><input type="file" name="u_face"></td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" value="添加用户" /></td>
			</tr>
		</table>
	</form>
</html>