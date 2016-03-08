<?php
	require_once("../include.php");
	header("Content-type:text/html;charset=utf-8");
	$sql = "select * from exam_classify order by concat(c_path,c_id)";
	var_dump($sql);
	$result = mysql_query($sql);
?>
<br /><br />
<form method="post" action="doAdminAction.php?act=upload_file" enctype="multipart/form-data">

	<table width="70%" border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
		<h3>文件上传</h3>
		<tr>
			<td>文件名称：</td>
			<td><input type="text" name="f_name" /></td>
		</tr>
		<tr>
			<td>文件描述：</td>
			<td><input type="text" name="f_desc" /></td>
		</tr>
		<tr>
			<td>文件类别：</td>
			<td>
				<select name="f_type">
					<option value="word">word</option>
					<option value="ppt">ppt</option>
					<option value="excel">excel</option>
					<option value="image">image</option>
					<option value="txt">txt</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>对应学院</td>
			<td>
				<select name="f_institute">
					<?php
						while($row = mysql_fetch_assoc($result)){							
							$arr1 = array("77","78","79","80","81","82","83","84","85","86","87","88","89","90","91");
							if(in_array($row['c_pid'], $arr1)){
								echo "<option value=".$row['c_id'].">".$row['c_name']."</option>";
							}	
						}
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td>对应课程：</td>
			<td>
				<select name="f_course">
					<?php 
						mysql_data_seek($result, 0);
						while($row = mysql_fetch_array($result)){
							$m = substr_count($row['c_path'],',')-1;
							$strpad = str_pad('', $m*18,'&nbsp;');
							$arr = array("0","77","78","79","80","81","82","83","84","85","86","87","88","89","90","91");
							if(in_array($row['c_pid'], $arr)){
								$check_dis = "disabled";
							}else{
								$check_dis = '';
							}
							echo "<option $check_dis value=".$row['c_id'].">".$strpad.$row['c_name']."</option>";
						}
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td>上传文件:</td>
			<td><input type="file" name="file" /></td>
		</tr>
		<tr>
			<td>上传价值:</td>
			<td><input type="text" name="f_value" /></td>
		</tr>
		<tr>
			<td colspan="2">
				<input type="submit" value="提交" />
			</td>
		</tr>
	</table>
</form>