<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>登陆</title>
<link type="text/css" rel="stylesheet" href="styles/reset.css">
<link type="text/css" rel="stylesheet" href="styles/main.css">
</head>

<body>
<div class="headerBar">
	<div class="logoBar login_logo">
		<div class="comWidth">
			<div class="logo fl">
				<a href="#"><img src="images/logo.jpg" alt="武科大"></a>
			</div>
			<h3 class="welcome_title">欢迎登陆</h3>
		</div>
	</div>
</div>

<div class="loginBox">
	<div class="login_cont">
		<form action="doAction.php?act=doLogin" method="post">
			<ul class="login">
				<li class="l_tit">邮箱/用户名/手机号</li>
				<li class="mb_10"><input type="text" class="login_input user_icon" name="u_username"></li>
				<li class="l_tit">密码</li>
				<li class="mb_10"><input type="password" class="login_input user_icon" name="u_password"></li>
				<li class="autoLogin"><input type="checkbox" id="a1" class="checked"><label for="a1">自动登陆</label></li>
				<li><input type="submit" value="登陆" class="login_btn"></li>
			</ul>
		</form>
		<div class="login_partners">
			<p class="l_tit">使用合作方账号登陆网站</p>
			<ul class="login_list clearfix">
				<li><a href="#">QQ</a></li>
				<li><span>|</span></li>
				<li><a href="#">网易邮箱</a></li>
				<li><span>|</span></li>
				<li><a href="#">新浪微博</a></li>
				<li><span>|</span></li>
				<li><a href="#">腾讯微博</a></li>
				<li><span>|</span></li>
				<li><a href="#">新浪微博</a></li>
				<li><span>|</span></li>
				<li><a href="#">腾讯微博</a></li>
			</ul>
		</div>
	</div>
	<a class="reg_link" href="#"></a>
</div>

<div class="hr_25"></div>
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
