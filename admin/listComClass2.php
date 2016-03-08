<?php
    require_once("../include.php");
    $page = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
    $pageSize = 7;
    $rows = getAllComClassByInfo($page,$pageSize);
    if(!$rows){
        alertMes("当前无分类，先添加","addComClass.php");
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
                <input type="button" value="添&nbsp;&nbsp;加" class="add"  onclick="addComClass()">
            </div>
                
        </div>
        <!--表格-->
        <table class="table" cellspacing="0" cellpadding="0">
            <thead>
                <tr>
                    <th width="15%">分类序号</th>
                    <th width="15%">分类父id</th>
                    <th width="20%">分类名称</th>
                    <th width="20%">分类路径</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($rows as $row):?>
                <tr>
                    <td>
                        <input type="checkbox" id="c1" class="check">
                        <label for="c1" class="label"><?php echo $row['c_id'];?></label>
                    </td>
                    <td><?php echo $row['c_pid'];?></td>
                    <td><?php echo $row['c_name'];?></td>
                    <td><?php echo $row['c_path'];?></td>
                    <td align="center">
                        <input type="button" value="修改" class="btn" onclick="editComClass(<?php echo $row['c_id'];?>)">
                        <input type="button" value="删除" class="btn" onclick="delComClass(<?php echo $row['c_id'];?>)">
                        <input type="button" value="添加子类" class="btn" onclick="addNewComClass('<?php echo $row['c_name'];?>',<?php echo $row['c_id'];?>,'<?php echo $row['c_path'].$row['c_id'];?>,')">
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
        function addNewComClass(c_name,c_id,c_path){
            window.location="addComClass.php?c_name="+c_name+"&c_pid="+c_id+"&c_path="+c_path;
        }
         function addComClass(){
            window.location="addComClass.php";
        }
        function editComClass(id){
            window.location="editComClass.php?id="+id;
        }
        function delComClass(id){
            if(window.confirm("确定删除？")){
                window.location="doAdminAction.php?act=delComClass&id="+id;
            }
        }
    </script>
</html>