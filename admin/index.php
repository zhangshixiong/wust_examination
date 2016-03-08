<?php
    require_once("../include.php");
    checkLogined();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>首页</title>
<link rel="stylesheet" href="style/backstage.css">
</head>
<body>
    <div class="head">
            <div class="logo fl"><a href="#"></a></div>
            <h3 class="head_text fr">科大考试网后台管理系统</h3>
    </div>
    <div class="operation_user clearfix">
        <div class="link fr">
            <b>欢迎您 
                <?php
                   if(isset($_SESSION['admin_name'])){
                        echo $_SESSION['admin_name'];
                   }else if(isset($_COOKIE['admin_name'])){
                        echo $_COOKIE['admin_name'];
                   }
                ?>           
            </b>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" class="icon icon_i">首页</a><span></span><a href="#" class="icon icon_j">前进</a><span></span><a href="#" class="icon icon_t">后退</a><span></span><a href="#" class="icon icon_n">刷新</a><span></span><a href="doAdminAction.php?act=logout" class="icon icon_e">退出</a>
        </div>
    </div>
    <div class="content clearfix">
        <div class="main">
            <!--右侧内容-->
            <div class="cont">
                <div class="title">后台管理</div>
                <!-- 嵌套网页开始 -->         
                <iframe src="main.php"  frameborder="0" name="mainFrame" width="100%" height="522"></iframe>
                <!-- 嵌套网页结束 -->   
            </div>
        </div>
        <!--左侧列表-->
        <div class="menu">
            <div class="cont">
                <div class="title">管理员</div>
                <ul class="mList">
                    <li>
                        <h3><span onclick="show('menu2','change2')" id="change2">+</span>分类管理</h3>
                        <dl id="menu2" style="display:none;">
                            <dd><a href="addCate.php" target="mainFrame">添加分类</a></dd>
                            <dd><a href="listCate.php" target="mainFrame">分类列表</a></dd>
                            <dd><a href="listCate2.php" target="mainFrame">分类无限浏览</a></dd>
                        </dl>
                    </li>
                    <li>
                        <h3><span  onclick="show('menu3','change3')" id="change3" >+</span>文件管理</h3>
                        <dl id="menu3" style="display:none;">
                            <dd><a href="a_upload_file.php" target="mainFrame">文件上传</a></dd>
                            <dd><a href="listFile.php" target="mainFrame">文件分类查看</a></dd>
                        </dl>
                    </li>
                    <li>
                        <h3><span onclick="show('menu4','change4')" id="change4">+</span>用户管理</h3>
                        <dl id="menu4" style="display:none;">
                            <dd><a href="addUser.php" target="mainFrame">添加用户</a></dd>
                            <dd><a href="listUser.php" target="mainFrame">用户列表</a></dd>
                        </dl>
                    </li>
                    <li>
                        <h3><span onclick="show('menu5','change5')" id="change5">+</span>管理员管理</h3>
                        <dl id="menu5" style="display:none;">
                            <dd><a href="addAdmin.php" target="mainFrame">添加管理员</a></dd>
                            <dd><a href="listAdmin.php" target="mainFrame">管理员列表</a></dd>
                        </dl>
                    </li>
                    <li>
                        <h3><span onclick="show('menu6','change6')" id="change6">+</span>公告管理</h3>
                        <dl id="menu6" style="display:none;">
                            <dd><a href="addShow.php" target="mainFrame">添加公告</a></dd>
                            <dd><a href="listShow.php" target="mainFrame">公告列表</a></dd>
                        </dl>
                    </li>
                    <li>
                        <h3><span onclick="show('menu7','change7')" id="change7">+</span>精品推荐</h3>
                        <dl id="menu7" style="display:none;">
                            <dd><a href="addRecommend.php" target="mainFrame">添加推荐</a></dd>
                            <dd><a href="listRecommend.php" target="mainFrame">推荐列表</a></dd>
                        </dl>
                    </li>
                    <li>
                        <h3><span onclick="show('menu8','change8')" id="change8">+</span>模块精选</h3>
                        <dl id="menu8" style="display:none;">
                            <dd><a href="addInfo.php" target="mainFrame">添加新闻信息</a></dd>
                            <dd><a href="listInfo.php" target="mainFrame">新闻信息列表</a></dd>
                            <dd><a href="addExp.php" target="mainFrame">添加经验</a></dd>
                            <dd><a href="listExp.php" target="mainFrame">经验列表</a></dd>
                            <dd><a href="addTest.php" target="mainFrame">添加等级考试</a></dd>
                            <dd><a href="listTest.php" target="mainFrame">等级考试列表</a></dd>
                            <dd><a href="addMessage.php" target="mainFrame">添加留言</a></dd>
                            <dd><a href="listMessage.php" target="mainFrame">查看留言</a></dd>
                            <dd><a href="listReMessage.php" target="mainFrame">查看回复留言</a></dd>
                            <dd><a href="uploadTest.php" target="mainFrame">上传等级考试卷子</a></dd>
                        </dl>
                    </li>
                </ul>
            </div>
        </div>

    </div>
    <script type="text/javascript">
        function show(num,change){
                var menu=document.getElementById(num);
                var change=document.getElementById(change);
                if(change.innerHTML=="+"){
                        change.innerHTML="-";
                }else{
                        change.innerHTML="+";
                }
               if(menu.style.display=='none'){
                     menu.style.display='';
                }else{
                     menu.style.display='none';
                }
        }
    </script>
</body>
</html>