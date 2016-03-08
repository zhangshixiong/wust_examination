<?php
	$id = $_REQUEST['id'];
?>
<form method="post" action="doAdminAction.php?act=addReMessage&pid=<?php echo $id;?>">
	<h3>回复留言</h3>
	<table width="60%" border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
		<tr>
			<td>用户名：</td>
			<td><input type="text" name="r_username"></td>
		</tr>
		<tr>
			<td>回复留言内容:</td>
			<td>
				<textarea cols="30" rows="5" name="r_content"></textarea>
			</td>
		</tr>
		<tr>
			<td colspan="2"><input type="submit" value="提交"/></td>
		</tr>
	</table>
</form>