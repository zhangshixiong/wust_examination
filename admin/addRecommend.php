<html>
	<h3>添加专栏</h3>
	<form method="post" action="doAdminAction.php?act=addRecommend" enctype="multipart/form-data">
		<table width="70%" border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
			<tr>
				<td>专栏名称</td>
				<td><input type="text" name="r_name" placeholder="请输入专栏名称" /></td>
			</tr>
			<tr>
				<td>专栏路径</td>
				<td><input type="text" name="r_load" placeholder="请输入专栏路径地址" /></td>
			</tr>
			<tr>
				<td>专栏图片</td>
				<td>
					<input type="file" name="r_path" />
				</td>
			</tr>
			<tr>
				<td>专栏描述</td>
				<td>
					<textarea cols="50" rows="3" name="r_desc"></textarea>
				</td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" value="添加专栏" /></td>
			</tr>
		</table>
	</form>
</html>
