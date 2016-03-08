
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge; charset=UTF-8">
<title>首页</title>
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

<div class="wrap">
	<!-左侧列表->
	<div class="courselist">
	<!--从数据库中得到所有的学院(存在问题，由于循环的时候不能够每一个都有一个class，所以列表的那个显示就有问题)-->
		<div class="course_font">按学院专业搜索资源</div>
		<ul class="All_acadamy">
			<li class="Computer"><a href="#">计算机科学与技术学院</a>
				<ul>
					<li><a href="sources.php?c_pid=92">计算机科学与技术</a></li>
					<li><a href="sources.php?c_pid=93">网络工程</a></li>
					<li><a href="sources.php?c_pid=94">软件工程</a></li>
					<li><a href="sources.php?c_pid=95">软件产业</a></li>
					<li><a href="sources.php?c_pid=96">信息安全</a></li>
				</ul>
			</li>

			<li class="Sourse"><a href="#">资源与环境工程学院</a>
				<ul>
					<li><a href="sources.php?c_pid=97">人文地理与城乡规划</a></li>
					<li><a href="sources.php?c_pid=98">资源与城乡规划管理</a></li>
					<li><a href="sources.php?c_pid=99">采矿工程</a></li>
					<li><a href="sources.php?c_pid=100">矿物加工工程</a></li>
					<li><a href="sources.php?c_pid=101">环境工程</a></li>
					<li><a href="sources.php?c_pid=102">安全工程</a></li>
				</ul>
			</li>

			<li class="Material"><a href="#">材料与冶金学院</a>
				<ul>
					<li><a href="sources.php?c_pid=103">无机非金属材料工程</a></li>
					<li><a href="sources.php?c_pid=104">材料成型及控制工程</a></li>
					<li><a href="sources.php?c_pid=105">能源与动力工程</a></li>
					<li><a href="sources.php?c_pid=106">冶金工程</a></li>
					<li><a href="sources.php?c_pid=107">金属材料工程</a></li>
					<li><a href="sources.php?c_pid=108">热能与动力工程</a></li>
				</ul>
			</li>

			<li class="Mechanical"><a href="#">机械自动化学院</a>
				<ul>
					<li><a href="sources.php?c_pid=109">机械工程</a></li>
					<li><a href="sources.php?c_pid=110">机械工程及自动化</a></li>
					<li><a href="sources.php?c_pid=111">机械电子工程</a></li>
					<li><a href="sources.php?c_pid=112">工业工程</a></li>
					<li><a href="sources.php?c_pid=113">机电一体化技术</a></li>
				</ul>
			</li>

			<li class="Information"><a href="#">信息科学与工程学院</a>
				<ul>
					<li><a href="sources.php?c_pid=115">电子信息工程</a></li>
					<li><a href="sources.php?c_pid=116">电气工程及自动化</a></li>
					<li><a href="sources.php?c_pid=117">自动化</a></li>
					<li><a href="sources.php?c_pid=118">电气自动化技术</a></li>
				</ul>
			</li>

			<li class="Supervise"><a href="#">管理学院</a>
				<ul>
					<li><a href="sources.php?c_pid=119">工商管理</a></li>
					<li><a href="sources.php?c_pid=120">财务管理</a></li>
					<li><a href="sources.php?c_pid=121">信息管理与信息系统</a></li>
					<li><a href="sources.php?c_pid=122">电子商务</a></li>
					<li><a href="sources.php?c_pid=123">物流管理</a></li>
					<li><a href="sources.php?c_pid=124">工程管理</a></li>
					<li><a href="sources.php?c_pid=125">市场营销</a></li>
					<li><a href="sources.php?c_pid=126">会计学</a></li>
					<li><a href="sources.php?c_pid=127">人力资源管理</a></li>
				</ul>
			</li>

			<li class="Law"><a href="#">文法与经济学院</a>
				<ul>
					<li><a href="sources.php?c_pid=128">国际经济与贸易</a></li>
					<li><a href="sources.php?c_pid=129">劳动与社会保障</a></li>
					<li><a href="sources.php?c_pid=130">法学</a></li>
					<li><a href="sources.php?c_pid=131">行政管理</a></li>
					<li><a href="sources.php?c_pid=132">社会工作</a></li>
					<li><a href="sources.php?c_pid=133">国际经济与贸易Z</a></li>
				</ul>
			</li>

			<li class="Science"><a href="#">理学院</a>
				<ul>
					<li><a href="sources.php?c_pid=134">信息与计算科学</a></li>
					<li><a href="sources.php?c_pid=135">材料物理</a></li>
					<li><a href="sources.php?c_pid=136">工程力学</a></li>
				</ul>
			</li>

			<li class="City"><a href="#">城市建设学院</a>
				<ul>
					<li><a href="sources.php?c_pid=137">建能应用工程</a></li>
					<li><a href="sources.php?c_pid=138">给排水科学与工程</a></li>
					<li><a href="sources.php?c_pid=139">建筑学</a></li>
					<li><a href="sources.php?c_pid=140">建筑学(艺术类)</a></li>
					<li><a href="sources.php?c_pid=141">土木工程</a></li>
					<li><a href="sources.php?c_pid=142">建筑环境与设备工程</a></li>
					<li><a href="sources.php?c_pid=143">给水排水工程</a></li>
					<li><a href="sources.php?c_pid=144">建筑工程技术</a></li>
				</ul>
			</li>

			<li class="Hospital"><a href="#">医学院</a>
				<ul>
					<li><a href="sources.php?c_pid=145">卫生检验</a></li>
					<li><a href="sources.php?c_pid=146">卫生检验与检疫</a></li>
					<li><a href="sources.php?c_pid=147">预防医学</a></li>
					<li><a href="sources.php?c_pid=148">临床医学</a></li>
					<li><a href="sources.php?c_pid=149">药学</a></li>
					<li><a href="sources.php?c_pid=150">护理学</a></li>
					<li><a href="sources.php?c_pid=151">护理</a></li>
				</ul>
			</li>

			<li class="Language"><a href="#">外国语学院</a>
				<ul>
					<li><a href="sources.php?c_pid=152">德语</a></li>
					<li><a href="sources.php?c_pid=153">英语</a></li>
					<li><a href="sources.php?c_pid=154">翻译</a></li>
				</ul>
			</li>

			<li class="Art"><a href="#">艺术与设计学院</a>
				<ul>
					<li><a href="sources.php?c_pid=155">艺术设计</a></li>
					<li><a href="sources.php?c_pid=156">工业设计</a></li>
					<li><a href="sources.php?c_pid=157">绘画</a></li>
					<li><a href="sources.php?c_pid=158">视觉传达设计</a></li>
					<li><a href="sources.php?c_pid=159">环境设计</a></li>
					<li><a href="sources.php?c_pid=160">产品设计</a></li>
					<li><a href="sources.php?c_pid=161">公共艺术</a></li>
					<li><a href="sources.php?c_pid=162">装饰艺术设计</a></li>
					<li><a href="sources.php?c_pid=163">电脑艺术设计</a></li>
				</ul>
			</li>

			<li class="International"><a href="#">国际学院</a>
				<ul>
					<li><a href="sources.php?c_pid=164">机械工程(国际)</a></li>
					<li><a href="sources.php?c_pid=165">电子信息工程(国际)</a></li>
					<li><a href="sources.php?c_pid=166">物流管理(国际)</a></li>
				</ul>
			</li>

			<li class="Chemistry"><a href="#">化学工程与技术学院</a>
				<ul>
					<li><a href="sources.php?c_pid=167">化学工程与工艺</a></li>
					<li><a href="sources.php?c_pid=168">生物工程</a></li>
					<li><a href="sources.php?c_pid=169">应用化学</a></li>
					<li><a href="sources.php?c_pid=170">应用化工技术</a></li>
				</ul>
			</li>

			<li class="Car"><a href="#">汽车与交通工程学院</a>
				<ul>
					<li><a href="sources.php?c_pid=171">车辆工程</a></li>
					<li><a href="sources.php?c_pid=172">交通运输</a></li>
					<li><a href="sources.php?c_pid=173">物流工程</a></li>
					<li><a href="sources.php?c_pid=174">交通工程</a></li>
					<li><a href="sources.php?c_pid=175">汽车服务工程</a></li>
					<li><a href="sources.php?c_pid=176">汽车运用技术</a></li>
				</ul>
			</li>
		</ul>
	</div>

	<!-以下为图片轮播->
	<div id="container">
	    <div id="list" style="left: -600px;">
	        <img src="images/5.jpg" alt="1"/>
	        <img src="images/1.jpg" alt="1"/>
	        <img src="images/2.jpg" alt="2"/>
	        <img src="images/3.jpg" alt="3"/>
	        <img src="images/4.jpg" alt="4"/>
	        <img src="images/5.jpg" alt="5"/>
	        <img src="images/1.jpg" alt="5"/>
	    </div>
	    <div id="buttons">
	        <span index="1" class="on"></span>
	        <span index="2"></span>
	        <span index="3"></span>
	        <span index="4"></span>
	        <span index="5"></span>
	    </div>
	    <a href="javascript:;" id="prev" class="arrow">&lt;</a>
	    <a href="javascript:;" id="next" class="arrow">&gt;</a>
	</div>
	<!-图片轮播结束->

	<!-右侧公告板->
	<div class="publicboard">
		<div class="pb">
			<a href="#">本站公告</a>
			<div style="font:14px solid black;">
			<?php
				$sql = "select * from exam_show order by s_id desc limit 1";
				$row = fetchOne($sql);
				echo "<br />".$row['s_title']."<br /><br />";
				echo $row['s_content']."<br /><br />";
				echo date("Y-m-d",$row['s_time'])."<br />";
			?>
			</div>
		</div>
	</div>

	
<div class="line"></div>
	
	<!-以下为精品专区->
	<div class="maj_special">
		<div class="maj_special_font">精品专区</div>
		<div class="maj_special_img"><img src="images/recomd.png"></div>
		<ul class="spectnt">
			<?php 
				$sql = "select r_path,r_desc,r_load,r_name from exam_recommend";
				$rows = fetchAll($sql);
				foreach ($rows as $row) {
					$imgUrl = explode('_', $row['r_path']);
					$desc = explode('_', $row['r_desc']);
					?>
					<li class="cs-style-3"><div class="inside_font"><a href="<?php echo $row['r_load'];?>"><?php echo $row['r_name'] ?></a></div>
						<figure>
							<div><img src="images/<?php echo $imgUrl['1'];?>" alt="easy60"></div>
							<figcaption>
								<div>
									<h5><?php echo $desc['0']; ?></h5><h5><?php echo $desc['1']; ?></h5>
									<h5><?php echo $desc['2']; ?></h5>
								</div>
								<a href="<?php echo $row['r_load'];?>">点击进入</a>
							</figcaption>
						</figure>
					</li>
					<?php
				}
			?>
			
		</ul>
	</div>


    <div class="line"></div>

		<!-本周热搜->
	<div class="hot_search">
		<div class="hot_search_font">本周热搜</div>
		<div class="hot_search_img"><img src="images/hot.png"></div>
		<ul class="hot_content">
			<?php 
				$sql = "select f_id,f_desc,f_name,f_path from exam_file order by f_dltimes desc limit 12";
				$rows = fetchAll($sql);
				$i=1;
				foreach ($rows as $row) {
					echo "<li>";
					echo "<a href='download.php?f_id=".$row['f_id']."&filename=".$row['f_path']."'><img src='images/untitled".$i.".jpg'></a>";
					echo "<div class='descrion'><a href='download.php?f_id=".$row['f_id']."&filename=".$row['f_path']."'>".$row['f_name']."</a></div>";
					echo "</li>";
					$i++;
				}
			?>			
		</ul>
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
		window.location="flogin.php";
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
</script>
</html>
