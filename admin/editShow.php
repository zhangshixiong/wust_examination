<?php
	require_once("../include.php");
	$id = $_GET['id'];
	$sql = "select * from exam_show where s_id = ".$id;
	$row = fetchOne($sql);
?>

<html>
	<h3>添加公告</h3>
	<form method="post" action="doAdminAction.php?act=editShow&id=<?php echo $id;?>">
		<table width="70%" border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
			<tr>
				<td>公告名称</td>
				<td><input type="text" name="s_title" value="<?php echo $row['s_title'];?>" /></td>
			</tr>
			<tr>
				<td>公告内容</td>
				<td>
					<textarea cols="30" rows="5" name="s_content"><?php echo $row['s_content'];?></textarea>
				</td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" value="添加公告" /></td>
			</tr>
		</table>
	</form>
</html>