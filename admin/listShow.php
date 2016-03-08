<?php
    require_once("../include.php");
    $page = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
    $pageSize = 4;
    $rows = getAllShowByPage($page,$pageSize);
    if(!$rows){
        alertMes("没有用户，请先添加","addUser.php");
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
                <input type="button" value="添&nbsp;&nbsp;加" class="add"  onclick="addShow();">
            </div>
                
        </div>
        <!--表格-->
        <table class="table" cellspacing="0" cellpadding="0">
            <thead>
                <tr>
                    <th width="15%">编号</th>
                    <th width="10%">公告时间</th>
                    <th width="10%">公告名称</th>
                    <th width="40%">公告内容</th>
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
                    <td><?php echo $row["s_time"]; ?></td>
                    <td><?php echo $row["s_title"]; ?></td>
                    <td><?php echo $row["s_content"]; ?></td>
                    <td align="center">
                        <input type="button" value="修改" class="btn" onclick="editShow(<?php echo $row['s_id'];?>)">
                        <input type="button" value="删除" class="btn" onclick="delShow(<?php echo $row['s_id'];?>);">
                    </td>
                </tr>
                <?php $i++; endforeach; ?>

                <?php if($totalRows>$pageSize):?>
                <tr>
                    <td colspan="5"><?php echo showPage($page,$totalPage); ?></td>
                </tr>
                <?php endif;?>

            </tbody>
        </table>
    </div>
    <script type="text/javascript">
        function editShow(id){
            window.location="editShow.php?id="+id;
        }
        function delShow(id){
            if(window.confirm("确定删除？")){
                window.location="doAdminAction.php?act=delShow&id="+id;
            }
        }
        function addShow(){
            window.location="addShow.php";
        }
    </script>
</body>
</html>