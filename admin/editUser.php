<?php
	require_once("../include.php");
	$id = $_REQUEST['id'];
	$sql = "select * from imooc_user where id=".$id;
	$row = fetchOne($sql);
?>

<html>
	<h3>添加管理员</h3>
	<form method="post" action="doAdminAction.php?act=editUser&id=<?php echo $id;?>" enctype="multipart/form-data">
		<table width="70%" border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
			<tr>
				<td>用户名</td>
				<td><input type="text" name="username" value="<?php echo $row['username'];?>" /></td>
			</tr>
			<tr>
				<td>密码</td>
				<td><input type="password" name="password" value="<?php echo $row['password'];?>" /></td>
			</tr>
			<tr>
				<td>邮箱</td>
				<td><input type="text" name="email" value="<?php echo $row['email'];?>" /></td>
			</tr>
			<tr>
				<td>性别</td>
				<td>
					
					<input type="radio" name="sex" value="1" <?php echo $row['sex']=="女"?"checked":null ;?>/>女
					<input type="radio" name="sex" value="2" <?php echo $row['sex']=="男"?"checked":null ;?> />男
					<input type="radio" name="sex" value="3" <?php echo $row['sex']=="保密"?"checked":null ;?>/>保密	
				</td>
			</tr>
			<tr>
				<td>上传头像</td>
				<td><input type="file" name="myFace"></td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" value="编辑用户" /></td>
			</tr>
		</table>
	</form>
</html>