<?php
    require_once("../include.php");
    $page = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
    $pageSize = 4;
    $rows = getAllExpByPage($page,$pageSize);
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
                <input type="button" value="添&nbsp;&nbsp;加" class="add"  onclick="addExp();">
            </div>
                
        </div>
        <!--表格-->
    <table class="table" cellspacing="0" cellpadding="0">
        <thead>
            <tr>
                <th width="5%">编号</th>
                <th width="10%">分享者</th>
                <th width="19%">标题</th>
                <th width="30%">分享内容</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            <?php  foreach($rows as $row):?>
            <tr>
                <td>
                    <input type="checkbox" id="c1" class="check">
                    <label for="c1" class="label"><?php echo $row['e_id'];?></label>
                </td>
                <td>
                    <?php echo $row['e_username']; ?>
                </td>
                <td>
                    <?php echo $row['e_title']; ?>
                </td>
                <td>
                    <?php echo mb_substr($row['e_content'], 0,40, 'utf-8')."......"; ?>
                </td>
                <td>
                   <input type="button" class="btn" value="添加" onclick="addExp()">
                   <input type="button" class="btn" value="删除" onclick="delExp(<?php echo $row['e_id'];?>)">
                   <input type="button" class="btn" value="编辑" onclick="editExp(<?php echo $row['e_id'];?>)">
                   <input type="button" class="btn" value="查看详情" onclick="lookAll(<?php echo $row['e_id'];?>)">
                </td>
            </tr>
            <?php  endforeach; ?>
            <?php if($totalRows>$pageSize):?>
            <tr>
                <td colspan="5"><?php echo showPage($page,$totalPage); ?></td>
            </tr>
            <?php endif;?>

        </tbody>
    </table>
    </div>
    <script type="text/javascript">
        function editExp(id){
            window.location="editExp.php?id="+id;
        }
        function delExp(id){
            if(window.confirm("确定删除？")){
                window.location="doAdminAction.php?act=delExp&id="+id;
            }
        }
        function addExp(){
            window.location="addExp.php";
        }
        function lookAll(id){
            window.location="lookAll.php?e_id="+id;
        }
    </script>
</body>
</html>