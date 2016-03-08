<?php
    require_once("../include.php");
    $page = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
    $pageSize = 4;
    $rows = getAllMessageByPage($page,$pageSize);
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
                <input type="button" value="添&nbsp;&nbsp;加" class="add"  onclick="addMessage();">
            </div>
                
        </div>
        <!--表格-->
    <table class="table" cellspacing="0" cellpadding="0">
        <thead>
            <tr>
                <th width="10%">编号</th>
                <th width="15%">留言者</th>
                <th width="30%">留言内容</th>
                <th width="10%">留言时间</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            <?php  foreach($rows as $row):?>
            <tr>
                <td>
                    <input type="checkbox" id="c1" class="check">
                    <label for="c1" class="label"><?php echo $row['m_id'];?></label>
                </td>
                <td>
                    <?php echo $row['m_username']; ?>
                </td>
                <td>
                    <?php echo $row['m_content']; ?>
                </td>
                <td>
                    <?php echo $row['m_time']; ?>
                </td>
                <td>
                   <input type="button" class="btn" value="添加" onclick="addMessage()">
                   <input type="button" class="btn" value="删除" onclick="delMessage(<?php echo $row['m_id'];?>)">
                    <input type="button" class="btn" value="编辑" onclick="editMessage(<?php echo $row['m_id'];?>)">
                    <input type="button" class="btn" value="回复" onclick="replyMessage(<?php echo $row['m_id'];?>)">
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
        function editMessage(id){
            window.location="editMessage.php?id="+id;
        }
        function delMessage(id){
            if(window.confirm("确定删除？")){
                window.location="doAdminAction.php?act=delMessage&id="+id;
            }
        }
        function addMessage(){
            window.location="addMessage.php";
        }
        function replyMessage(id){
            window.location="replyMessage.php?id="+id;
        }
    </script>
</body>
</html>