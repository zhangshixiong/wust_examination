<br /><br />
<form method="post" action="doAdminAction.php?act=addMessage">
	<h3>添加留言</h3>
	<table width="60%" border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
		<tr>
			<td>用户名：</td>
			<td><input type="text" name="m_username"></td>
		</tr>
		<tr>
			<td>留言内容:</td>
			<td>
				<textarea cols="30" rows="5" name="m_content"></textarea>
			</td>
		</tr>
		<tr>
			<td colspan="2"><input type="submit" value="提交"/></td>
		</tr>
	</table>
</form>