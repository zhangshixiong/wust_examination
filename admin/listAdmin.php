<?php
    require_once("../include.php");
    $page = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
    $pageSize = 5;
    $rows = getAllAdminByPage($page,$pageSize);
    if(!$rows){
        alertMes("当前无管理员，请先添加","addAdmin.php");
        exit();
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
                <input type="button" value="添&nbsp;&nbsp;加" class="add"  onclick="addAdmin();">
            </div>
                
        </div>
        <!--表格-->
        <table class="table" cellspacing="0" cellpadding="0">
            <thead>
                <tr>
                    <th width="15%">编号</th>
                    <th width="25%">管理员名称</th>
                    <th width="30%">管理员邮箱</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                <?php $i=1; foreach($rows as $row):?>
                <tr>
                    <td>
                        <input type="checkbox" id="c1" class="check">
                        <label for="c1" class="label"><?php echo $i;?></label>
                    </td>
                    <td><?php echo $row["a_username"]; ?></td>
                    <td><?php echo $row["a_email"]; ?></td>
                    <td align="center">
                        <input type="button" value="修改" class="btn" onclick="editAdmin(<?php echo $row['a_id'];?>)">
                        <input type="button" value="删除" class="btn" onclick="delAdmin(<?php echo $row['a_id'];?>);">
                    </td>
                </tr>
                <?php $i++; endforeach; ?>

                <?php if($totalRows>$pageSize):?>
                <tr>
                    <td colspan="4"><?php echo showPage($page,$totalPage); ?></td>
                </tr>
                <?php endif;?>

            </tbody>
        </table>
    </div>
    <script type="text/javascript">
        function editAdmin(id){
            window.location="editAdmin.php?id="+id;
        }
        function delAdmin(id){
            if(window.confirm("确定删除？")){
                window.location="doAdminAction.php?act=delAdmin&id="+id;
            }
        }
        function addAdmin(){
            window.location="addAdmin.php";
        }
    </script>
</body>
</html>