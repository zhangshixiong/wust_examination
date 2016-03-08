<!DOCTYPE html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge; charset=UTF-8">
<title>顶部浮动导航</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, minimum-scale=1 user-scalable=no">
<link href="css/top.css" rel="stylesheet" type="text/css">
<link href="css/navigation.css" rel="stylesheet" type="text/css">
<link href="css/img.css" rel="stylesheet" type="text/css">
<link href="css/courselist.css" rel="stylesheet" type="text/css">
<link href="css/publicboard.css" rel="stylesheet" type="text/css">
<link href="css/maj_special.css" rel="stylesheet" type="text/css">
<link href="css/hot_search.css" rel="stylesheet" type="text/css">
<link href="css/container1.css" rel="stylesheet" type="text/css">
<link href="css/footer.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="css/lrtk.css" />
<link href="css/message.css" rel="stylesheet" type="text/css">
<script src="js/modernizr.custom.js"></script>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.smint.js"></script>
<script type="text/javascript" src="js/subMenu.js"></script>
</head>
<body onLoad="setTimeout(function() { window.scrollTo(0, 1) }, 100);">
<script type="text/javascript" src="js/img.js"></script>

	<div class="subMenu">
		<div class="inner">
			<a></a>
			<div class="logo"></div>
			<form action="search.php" method="post">
				<input type="text" class="search-input" name="keywords" placeholder="例如：高等数学" />
				<input type="submit" class="search-submit" value=""/>
			</form>		
			
			<?php 
				require_once("./include.php");
				if(isset($_SESSION['loginFlag'])){
					$sql = "select u_face from exam_user where u_id = ".$_SESSION['loginFlag'];
					$row = fetchOne($sql);

					//判断图片是否存在，如果找到了就显示，否则用默认的图片
					if(file_exists("uploads_face".$row['u_face'])){
						$src = "uploads_face/".$row['u_face'];
					}else{
						$src = "images/user.png";
					}					
					?>
				        <div class="personal">
						    <ul class="nav__menu">
						      <li class="nav__menu-item"><a><img src="<?php echo $src; ?>" /><font>个人中心</font></a>
						        <ul class="nav__submenu">
						        <?php 
					        			$sql = "select * from exam_message where m_username='".$_SESSION['username']."'";
										$rows = fetchAll($sql);
										$sum=0;
										foreach ($rows as $row) {
											$sql = "select * from exam_remessage where r_pid=".$row['m_id']." and r_isread=0";
											$re = fetchAll($sql);
											$sum = $sum+getResultNum($sql);
										}
						        	?>
						          <li class="nav__submenu-item"><a href="#"><?php echo $_SESSION['username']; ?></a></li>
						          <li class="nav__submenu-item"><a href="javascript:void(0)" onclick="userMessage()"><img src="images/xiaoxi.png"/>消息<span class="num">(<?php echo $sum; ?>)</span></a></a></li>
						          <li class="nav__submenu-item"><a href="javascript:void(0)" onclick="setUserInfo()"><img src="images/user.png"/>设置</a></li>
						          <li class="nav__submenu-item"><a href="javascript:void(0)" onclick="userOut()"><img src="images/tuichu.png"/>退出</a></li>
						        </ul>
						      </li>
						    </ul>
						 </div>
					<?php
				}else{
					echo "<div class='form1'>";
					echo "<input type='button' class='reg-button' onclick='reg()' />";
					echo "<input type='button' class='login-button' onclick='login()'/>";
					echo "</div>";
				}
			?>

		</div>
	</div>

	<div class="navigation"> 
	</div>
	<div class="sources_body">
			
		<div id="sources_rbody">
			<?php 
				$page = isset($_GET['page'])?$_GET['page']:1;
				$pageSize = 5;
				$sql = "select * from exam_message";
				$totalRows = getResultNum($sql);
				$totalPage = ceil($totalRows/$pageSize);

				$offset = ($page-1)*$pageSize;
				$sql1 = "select * from exam_message order by m_time desc limit $offset,$pageSize";
				$rows = fetchAll($sql1);

			?>
			<div class="ay" style="font-size:42px;">留言板</div>
			<hr/>
			<?php 
				echo "<div class='return'><a href='index.php'>回到首页</a></div><br />"; 
				if(isset($_SESSION['loginFlag']) || isset($_SESSION['username'])){
					?>
						<input  type="button"  value="我要留言" onclick="leave()"  class="submit2" />
					<?php
				}else{
					?>
						<input  type="button"  value="我要留言" onclick="login()"  class="submit2" />
					<?php
				}
			?>
			<div class="a2">已有留言:【<?php echo $totalRows; ?>】</div><br>
			<?php 
				
				foreach ($rows as $row) {
					?>
						<div class="a1">
							<div class="b1">昵称:<?php echo $row['m_username']; ?></div>
							<div class="b2"><?php echo $row['m_content']; ?><a class="a" href="remessage.php?flag=1&m_id=<?php echo $row['m_id'];?>">&nbsp;&nbsp;&nbsp; 【我要回复】</a> </div>
							<div class="b3"><a class="a" href="remessage.php?m_id=<?php echo $row['m_id'];?>">【查看所有回复留言】</a> &nbsp;&nbsp;&nbsp;<?php echo date('Y-m-d H:i',$row['m_time']); ?></div>
						</div>
					<?php
				}
			?>
			
			<div id="fenye">
				<?php
					echo showPage($page,$totalPage);
				?>
			</div><br>
			<hr/>
			
			<?php 
				if(isset($_SESSION['loginFlag'])){
					?>
					<form action="doAction.php?act=addFrontMes" method="post" class="form_mes">
						<textarea name="m_content" id="form5" cols="84" rows="4"></textarea>
						<div class="t1">
							验证码：<input type="text" name="verify" class="v_input"/>
							<div  class="veri" ><img src="./admin/getVerify.php" alt="考试网"/>&nbsp;&nbsp;&nbsp;</div>
							<input type="submit" value="提交">
						</div>				
					</form>	
					<?php
				}
			?>
					

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


	<script type='text/javascript'>
	function reg(){
		window.location="reg.php";
	}
	function login(){
		window.location="flogin.php?from=message";
	}
	function userOut(){
		window.location="doAction.php?act=userOut";
	}
	function setUserInfo(){
		window.location="setUserInfo.php";
	}
	function userMessage(){
		window.location="userMessage.php";
	}
	function leave(){
		document.getElementById('form5').focus();
	}
</script>