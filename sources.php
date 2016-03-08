<?php
	require_once("include.php");
	$page = isset($_GET['page']) ? $_GET['page']:1;
	$pageSize = 10;
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge; charset=UTF-8">
<title>查找资源</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, minimum-scale=1 user-scalable=no">
<link href="css/top.css" rel="stylesheet" type="text/css">
<link href="css/sources.css" rel="stylesheet" type="text/css">
<link href="css/navigation.css" rel="stylesheet" type="text/css">
<script src="js/sources_xianshigengduo.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.smint.js"></script>
<script type="text/javascript" src="js/subMenu.js"></script>
<script type="text/javascript" src="js/search.js"></script>
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
	<div class="sources_classify"> 
	    <p style="line-height:150%;color:white;">资源分类</p>
	</div>
	
	
	<div class="sources_body">
		<div id="sources_rbody">
			<div class="sourses_rbody_head">
				<?php 
					if(isset($_GET['c_pid']) && !isset($_GET['c_id'])){?>
						<ul>
							<li><a href="sources.php?c_type=word&c_pid=<?php echo $_GET['c_pid']; ?>">历年试卷</a></li>
							<li><a href="sources.php?c_type=ppt&c_pid=<?php echo $_GET['c_pid']; ?>">复习课件</a></li>
							<li><a href="xueba.php?c_type=image&c_pid=<?php echo $_GET['c_pid'] ; ?>">学霸笔记</a></li>
						</ul>
					<?php
					}
					if(isset($_GET['c_pid']) && isset($_GET['c_id'])){?>
						<ul>
							<li><a href="sources.php?c_type=word&c_pid=<?php echo $_GET['c_pid'] ?>&c_id=<?php echo $_GET['c_id']; ?>">历年试卷</a></li>
							<li><a href="sources.php?c_type=ppt&c_pid=<?php echo $_GET['c_pid'] ?>&c_id=<?php echo $_GET['c_id']; ?>">复习课件</a></li>
							<li><a href="xueba.php?c_type=image&c_pid=<?php echo $_GET['c_pid'] ?>&c_id=<?php echo $_GET['c_id']; ?>">学霸笔记</a></li>
						</ul>
					<?php
					}
				?>
				
			</div>
		     <br/>
			 <!--XXXX对应XX分类：查找的关键词-->
			 <?php

			 //接收信息
			 	
			 	if(!isset($_GET['c_pid'])){
			 		echo "<script>alert('请先选择学院！');window.location='index.php';</script>";
			 	}else if(isset($_GET['c_id']) && !isset($_GET['c_type']) && isset($_GET['c_pid'])){
				 	$sql1 = "select * from exam_file where f_course=".$_GET['c_id'];
				}else if(isset($_GET['c_pid']) && !isset($_GET['c_id']) && !isset($_GET['c_type'])){
				 	$sql1 = "select * from exam_file where f_institute=".$_GET['c_pid'];
				}else if(isset($_GET['c_pid']) && !isset($_GET['c_id']) && isset($_GET['c_type'])){
					$type = $_GET['c_type'];
					$sql1 = "select * from exam_file where f_institute=".$_GET['c_pid']." and f_type='".$type."'";
				}else if(isset($_GET['c_pid']) && isset($_GET['c_id']) && isset($_GET['c_type'])){
					$type = $_GET['c_type'];
					$sql1 = "select * from exam_file where f_type='".$type."' and f_course=".$_GET['c_id'];
				}
				$totalRows = getResultNum($sql1);
			 //分页设置
			    $totalPage = ceil($totalRows/$pageSize);
			 	if($page<1 || !is_numeric($page) || $page==null){
			 	    $page = 1;
			 	}
			 	if($page>$totalPage){
			 	    $page = $totalPage;
			 	}
			 	if($totalPage == 0){
			 		$page = 1;
			 		$totalPage = 1;
			 	}
			 	$offset = ($page-1)*$pageSize;
			 	
			 //查询分页信息
				if(!isset($_GET['c_pid'])){
			 		echo "<script>alert('请先选择学院！');window.location='index.php';</script>";
			 	}else if(isset($_GET['c_id']) && !isset($_GET['c_type'])){			 		
				 	$sql = "select * from exam_file where f_course=".$_GET['c_id']." limit ".$offset.",".$pageSize;	
					var_dump($sql);
				}else if(isset($_GET['c_pid']) && !isset($_GET['c_id']) && !isset($_GET['c_type'])){
			 		$sql = "select * from exam_file where f_institute=".$_GET['c_pid']." limit ".$offset.",".$pageSize;
					var_dump($sql);
				}else if(isset($_GET['c_pid']) && !isset($_GET['c_id']) && isset($_GET['c_type'])){
					$type = $_GET['c_type'];
					$sql = "select * from exam_file where f_institute=".$_GET['c_pid']." and f_type='".$type."' limit ".$offset.",".$pageSize;
					var_dump($sql);
				}else if(isset($_GET['c_pid']) && isset($_GET['c_id']) && isset($_GET['c_type'])){
					$type = $_GET['c_type'];
					$sql = "select * from exam_file where f_type='".$type."' and f_course=".$_GET['c_id']." limit ".$offset.",".$pageSize;
					var_dump($sql);
				}
					 	
			 	$rows = fetchAll($sql);
			 ?>

			 <p id="nowant"><font color=black>（共找到<font color=red><?php echo $totalRows;?></font>条信息）</font><a href="#" target="_blank"><font color=blue> <a href="">没有找到你想要的？留言给我们</a> </font></a></p>
		     <br />
		     <table style="margin-left:5px;border-top:0px solid #CECECE;" border=1px  width=670px   cellspacing=0px  bordercolor="#CECECE">    

		         <tr bgcolor="#C0C0C0">
					 <td style="border-top:2px solid #777A83;height:25px;"><p align=center><font color=black><B>文档类型</B></font></p></td>  <!--XX分类:显示的时候根据XX分的类-->
				     <td style="border-top:2px solid #777A83;"><p align=center><font color=black><B>试题名称</B></font></p></td>
				     <td style="border-top:2px solid #777A83;"><p align=center><font color=black><B>热度</B></font></p></td>
					 <td style="border-top:2px solid #777A83;"><p align=center><font color=black><B>大小</B></font></p></td>
				     <td style="border-top:2px solid #777A83;"><p align=center><font color=black><B>更新时间</B></font></p></td>
					 <td style="border-top:2px solid #777A83;"><p align=center><font color=black><B>扣点数</B></font></p></td>
			     	 <td style="border-top:2px solid #777A83;"><p align=center><font color=black><B>下载</B></font></p></td>

			     </tr>
				<?php
					if(isset($rows)){
						if($rows){
				        	foreach ($rows as $row) {
				        		$sql = "select c_name from exam_classify where c_id=".$row['f_institute'];
				        		$name = fetchOne($sql);
				        		switch ($row['f_type']) {
				        			case 'txt':
				        				$src = "./images/t.png";
				        				break;

				        			case 'image':
				        				$src = "./images/www.jpg";
				        				break;

				        			case 'word':
				        				$src = "./images/W.png";
				        				break;

				        			case 'ppt':
				        				$src = "./images/P.png";
				        				break;
				        			//这里差个excel的图标
				        			case 'excel':
				        				$src = "./images/P.png";
				        				break;

				        			default:
				        				# code...
				        				break;
				        		}
				        		?>
							     <tr>
								     <td style="height:25px;"><p align=center><font color=black><img src=' <?php echo $src ?> '  width="26px" height="20px" alt=""></font></p></td>  
								     <td class="rbody_p2"><a href='download.php?f_id=<?php echo $row['f_id'];?>&filename=<?php echo $row['f_path'];?>'><p><font color=black><?php echo $row['f_name'];?></font></p></a></td>
								     <td><p align=center><font color=black><?php echo $row['f_dltimes'];?></font></p></td>
									 <td><p align=center><font color=black><?php echo transByte($row['f_size']);?></font></p></td>
								     <td><p align=center><font color=black><?php echo date("Y-m-d",$row['f_time']);?></font></p></td>
				                     <td><p align=center><font color=black><?php echo $row['f_value'];?></font></p></td>					 
							    	 <td><p align=center><font color=black><a href="download.php?f_id=<?php echo $row['f_id'];?>&filename=<?php echo $row['f_path'];?>"><img src="images/s.jpg" alt="" width="26px" height="20px"></a></font></p></td>
							     </tr>
				        		<?php	
				        	} 
				        }
				    }		        
		        ?>
			     			 				 				 
		</table>

		<!-- 这里css我改了，因为从数据库读的，不好看，以后再改改样式 -->
		<div id="fenye">
			<?php
				echo showPage($page,$totalPage);
			?>
		</div>
		
	</div>
		
	    <div id="xiangguanleimu"><p align="center"><strong>资源分类</strong></p></div>
		<div id="linianshijuan">
		    <img src="images/sources_icon.jpg"/>
			<p><strong>历年试卷</strong></p>			 
		</div>
		
      <form id="form1" runat="server">
        <div id="linianshijuan_content">                 
	 		<?php
	 			$arr = array("大一第一学期","大一第二学期","大二第一学期","大二第二学期","大三第一学期","大三第二学期","大四第一学期","大四第二学期");
	 			$arr1 = array("a","b","c","d","e","f","g","h");
	 			if(isset($_GET['c_pid'])){
	 				$sql = "select c_id from exam_classify where c_pid=".$_GET['c_pid'];
	 				$rows = fetchAll($sql);
	 				$i = 0;
	 				if($rows){
		 				foreach ($rows as $row) {?>
		 					<div id="DYS"><a href="#" target="_blank"><p><strong><?php echo $arr[$i];?></strong></p></a></div>
		 					<div id="xianshigengduo"><a onclick="return click_a('DYS_courses<?php echo $arr1[$i];?>')" style="cursor:pointer;">显示更多</a></div>
		 					<div class="disnone" id="DYS_courses<?php echo $arr1[$i];?>" style="display:none;">
		 					<?php
			 					$sql = "select c_id,c_name from exam_classify where c_pid=".$row['c_id'];
			 					$res = fetchAll($sql);
			 					if($res){
				 					foreach ($res as $re) {
				 						echo "<a href='sources.php?c_id=".$re['c_id']."&c_pid=".$_GET['c_pid']."'><p>".$re['c_name']."</p></a>";
				 					}
			 					}
			 					$i++;
		 					?>
		 					</div>
		 					<?php	
		 				}
		 			}
	 			}			
	 		?>         				 
        </div>
		
      </form>
		
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
