<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>注册</title>
<link type="text/css" rel="stylesheet" href="styles/reset.css">
<link type="text/css" rel="stylesheet" href="styles/main.css">
<link href="css/footer.css" rel="stylesheet" type="text/css">
</head>

<body>
<div class="headerBar">
	<div class="logoBar red_logo">
		<div class="comWidth">
			<div class="logo fl">
				<a href="#"><img src="images/logo.jpg" alt="考试网"></a>
			</div>
			<h3 class="welcome_title">欢迎注册</h3>
		</div>
	</div>
</div>

<div class="regBox">
	<div class="login_cont">
		<form method="post" action="doAction.php?act=reg" enctype="multipart/form-data">
		<ul class="login">
			<li><span class="reg_item"><i>*</i>用户名：</span><div class="input_item"><input type="text" class="login_input user_icon" name="u_username" placeholder="请输入用户名"></div></li>
			<li><span class="reg_item"><i>*</i>密码：</span><div class="input_item"><input type="password" class="login_input user_icon" name="u_password" placeholder="请输入密码"></div></li>
			<li><span class="reg_item"><i>*</i>邮箱：</span><div class="input_item"><input type="email" class="login_input user_icon" name="u_email" placeholder="请输入合法邮箱"></div></li>
			<li><span class="reg_item"><i>*</i>性别：</span>
				<div class="input_item">
					<input type="radio"  name="u_sex" value="1" >男
					<input type="radio"  name="u_sex" value="2">女
					<input type="radio"  name="u_sex" value="3" checked>保密
				</div>
			</li>
			<li>
				<span class="reg_item"><i>*</i>上传头像：</span><div class="input_item">
				<input type="file" name="u_face"></div>
			</li>
			<li class="autoLogin"><span class="reg_item">&nbsp;</span><input type="checkbox" id="t1" class="checked"><label for="t1">我同意什么什么条款</label></li>
			<li><span class="reg_item">&nbsp;</span><input type="submit" value="注册" class="login_btn"></li>
		</ul>
		</form>
	</div>
</div>


<div class="footer">
		<div class="desption_font1">
			<a href="www.baidu.com">easy60简介</a> | <a href="#">easy60公告</a>||<a href="#"> 联系我们</a> | 服务热线 : 15671654036
		</div>
		<div class="desption_font2">
			Copyright © 2006 - 2015 easy60版权所有   ——武汉科技大学easy60团队
		</div>
</div>
</body>
</html>
