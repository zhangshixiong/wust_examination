<?php
	require_once("../include.php");
	$id= $_REQUEST['id'];
	$sql = "select * from exam_remessage where r_id=".$id;
	$row = fetchOne($sql);
?>
<form method="post" action="doAdminAction.php?act=editReMessage&id=<?php echo $id;?>">
	<h3>编辑回复留言</h3>
	<table width="60%" border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
		<tr>
			<td>用户名：</td>
			<td><input type="text" name="r_username" value="<?php echo $row['r_username'];?>"></td>
		</tr>
		<tr>
			<td>回复内容：</td>
			<td>
				<textarea cols="30" rows="5" name="r_content"><?php echo $row['r_content'];?></textarea>
			</td>
		</tr>
		<tr>
			<td>回复留言编号：</td>
			<td><input type="text" name="r_pid" value="<?php echo $row['r_pid']?>"></td>
		</tr>
		<tr>
			<td colspan="2"><input type="submit" value="提交"/></td>
		</tr>
	</table>
</form>