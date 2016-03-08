<?php
    require_once("../include.php");
    $page = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
    $pageSize = 4;
    $rows = getAllReMessageByPage($page,$pageSize);
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
                <input type="button" value="添&nbsp;加&nbsp;留&nbsp;言" class="add"  onclick="addMessage();">
            </div>
                
        </div>
        <!--表格-->
    <table class="table" cellspacing="0" cellpadding="0">
        <thead>
            <tr>
                <th width="10%">编号</th>
                <th width="5%">回复留言编号</th>
                <th width="15%">留言者</th>
                <th width="30%">留言内容</th>
                <th width="10%">留言时间</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($rows as $row):?>
            <tr>
                <td>
                    <input type="checkbox" id="c1" class="check">
                    <label for="c1" class="label"><?php echo $row['r_id'];?></label>
                </td>
                <td>
                    <?php echo $row['r_pid']; ?>
                </td>
                <td>
                    <?php echo $row['r_username']; ?>
                </td>
                <td>
                    <?php echo $row['r_content']; ?>
                </td>
                <td>
                    <?php echo $row['r_time']; ?>
                </td>
                <td>
                   <input type="button" class="btn" value="删除" onclick="delReMessage(<?php echo $row['r_id'];?>)">
                   <input type="button" class="btn" value="编辑" onclick="editReMessage(<?php echo $row['r_id'];?>)">
                   <input type="button" class="btn" value="查看留言" onclick="listMessage()">
                </td>
            </tr>
            <?php endforeach; ?>
            <?php if($totalRows>$pageSize):?>
            <tr>
                <td colspan="6"><?php echo showPage($page,$totalPage); ?></td>
            </tr>
            <?php endif;?>
        </tbody>
    </table>
    </div>
    <script type="text/javascript">
        function editReMessage(id){
            window.location="editReMessage.php?id="+id;
        }
        function delReMessage(id){
            if(window.confirm("确定删除？")){
                window.location="doAdminAction.php?act=delReMessage&id="+id;
            }
        }
        function addReMessage(){
            window.location="addReMessage.php";
        }
        function addMessage(){
            window.location="addMessage.php";
        }
        function listMessage(){
            window.location="listMessage.php";
        }
    </script>
</body>
</html>