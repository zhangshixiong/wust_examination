<html>
	<h3>添加公告</h3>
	<form method="post" action="doAdminAction.php?act=addShow">
		<table width="70%" border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
			<tr>
				<td>公告名称</td>
				<td><input type="text" name="s_title" placeholder="请输入公告名称" /></td>
			</tr>
			<tr>
				<td>公告内容</td>
				<td>
					<textarea cols="30" rows="5" name="s_content"></textarea>
				</td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" value="添加公告" /></td>
			</tr>
		</table>
	</form>
</html>