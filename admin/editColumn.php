<?php
	require_once("../include.php");
	$id = $_GET['id'];
	$sql = "select * from exam_recommend where r_id=".$id;
	$row = fetchOne($sql);
?>

<html>
	<h3>编辑专栏</h3>
	<form method="post" action="doAdminAction.php?act=editColumn&id=<?php echo $id;?>" enctype="multipart/form-data">
		<table width="70%" border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
			<tr>
				<td>专栏名称</td>
				<td><input type="text" name="r_name" value="<?php echo $row['r_name']?>" /></td>
			</tr>
			<tr>
				<td>专栏图片</td>
				<td>
					<input type="file" name="r_path" value="<?php echo $row['r_path'];?>"/>
				</td>
			</tr>
			<tr>
				<td>专栏描述</td>
				<td>
					<textarea cols="50" rows="3" name="r_desc" ><?php echo $row['r_desc'];?></textarea>
				</td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" value="编辑专栏" /></td>
			</tr>
		</table>
	</form>
</html>
