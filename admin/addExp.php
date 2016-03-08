<html>
	<h3>添加经验</h3>
	<form method="post" action="doAdminAction.php?act=addExp">
		<table width="70%" border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
			<tr>
				<td>用户名</td>
				<td><input type="text" name="e_username" placeholder="请输入用户名" /></td>
			</tr>
			<tr>
				<td>标题</td>
				<td><input type="text" name="e_title" placeholder="请输入经验标题" /></td>
			</tr>
			<tr>
				<td>文本</td>
				<td>
					<textarea cols="80" rows="10" placeholder="请输入内容" name="e_content"></textarea>
				</td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" value="添加经验" /></td>
			</tr>
		</table>
	</form>
</html>