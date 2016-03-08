<?php
    require_once("../include.php");
    $page = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
    $pageSize = 7;
    $rows = getAllTestByPage($page,$pageSize);
    if(!$rows){
        alertMes("当前无分类，先添加","addTest.php");
    }
?>
<html>
<head>
<meta charset="utf-8">
<title>-.-</title>
<link rel="stylesheet" href="style/backstage.css">
</head>
<body>
    <div class="details">
        <div class="details_operation clearfix">
            <div class="bui_select">
                <input type="button" value="添&nbsp;&nbsp;加" class="add"  onclick="addTest()">
            </div>
                
        </div>
        <!--表格-->
        <table class="table" cellspacing="0" cellpadding="0">
            <thead>
                <tr>
                    <th width="15%">分类序号</th>
                    <th width="30%">分类名称</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($rows as $row):?>
                <tr>
                    <td>
                        <input type="checkbox" id="c1" class="check">
                        <label for="c1" class="label"><?php echo $row['t_id'];?></label>
                    </td>
                    <td><?php echo $row['t_name'];?></td>
                    <td align="center">
                        <input type="button" value="删除" class="btn" onclick="delTest(<?php echo $row['t_id'];?>)">
                    </td>
                </tr>  
                <?php endforeach;?> 
                <?php if($totalRows>$pageSize):?>             
                <tr>
                    <td colspan="5"><?php echo showPage($page,$totalPage); ?></td>
                </tr>
                <?php endif;?>
            </tbody>
        </table>
    </div>
</body>
    <script text='text/javascript'>
         function addTest(){
            window.location="addTest.php";
        }
        function delTest(id){
            if(window.confirm("确定删除？")){
                window.location="doAdminAction.php?act=delTest&id="+id;
            }
        }
    </script>
</html>