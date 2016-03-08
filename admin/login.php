<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>登陆</title>
<link type="text/css" rel="stylesheet" href="style/reset.css">
<link type="text/css" rel="stylesheet" href="style/main.css">
</head>

<body>
<div class="headerBar">
	<div class="logoBar login_logo">
		<div class="comWidth">
			<div class="logo fl">
				<a href="#"><img src="images/logo.jpg" alt="考试网"></a>
			</div>
			<h3 class="welcome_title">欢迎登陆</h3>
		</div>
	</div>
</div>

<div class="loginBox">
	<div class="login_cont">
		<form method="post" action="doLogin.php">
			<ul class="login">
				<li class="l_tit">管理员账号</li>
				<li class="mb_10"><input type="text" name="a_username" class="login_input user_icon"></li>
				<li class="l_tit">密码</li>
				<li class="mb_10"><input type="text" name="a_password" class="login_input user_icon"></li>
				<li class="l_tit">验证码</li>
				<li class="mb_10"><input type="text" name="verify" class="login_input user_icon"></li>
				<img src="getVerify.php" alt="考试网" />
				<li class="autoLogin"><input type="checkbox" id="a1" class="checked" name="autoFlag" value="0"><label for="a1">自动登陆</label></li>
				<li><input type="button" value="" class="login_btn"></li>
			</ul>
			<input type="submit" name="submit" value="提交" />
			<div class="login_partners">
				<p class="l_tit">使用合作方账号登陆网站</p>
				<ul class="login_list clearfix">
					<li><a href="#">QQ</a></li>
					<li><span>|</span></li>
					<li><a href="#">网易</a></li>
					<li><span>|</span></li>
					<li><a href="#">新浪微博</a></li>
					<li><span>|</span></li>
					<li><a href="#">腾讯微薄</a></li>
					<li><span>|</span></li>
					<li><a href="#">新浪微博</a></li>
					<li><span>|</span></li>
					<li><a href="#">腾讯微薄</a></li>
				</ul>
			</div>
		</form>
	</div>
	<a class="reg_link" href="#"></a>
</div>

<div class="hr_25"></div>
<div class="footer">
	<p><a href="#">考试网简介</a><i>|</i><a href="#">考试网公告</a><i>|</i><i>|</i><a href="#">联系我们</a><i>|</i>客服热线：5400-675-1234</p>
	<p>Copyright &copy; 2006 - 2015 考试网版权所有&nbsp;&nbsp;&nbsp;w武汉科技大学</p>
	<p class="web"><a href="#"><img src="images/webLogo.jpg" alt="logo"></a><a href="#"><img src="images/webLogo.jpg" alt="logo"></a><a href="#"><img src="images/webLogo.jpg" alt="logo"></a><a href="#"><img src="images/webLogo.jpg" alt="logo"></a></p>
</div>
</body>
</html>
