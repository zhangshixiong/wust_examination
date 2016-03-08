<?php
    require_once("../include.php");
    $page = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
    $pageSize = 4;
    $rows = getAllColumnByPage($page,$pageSize);
    if(!$rows){
        alertMes("没有专栏，请先添加","addRecommend.php");
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
                <input type="button" value="添&nbsp;&nbsp;加" class="add"  onclick="addRecommend();">
            </div>
                
        </div>
        <!--表格-->
        <table class="table" cellspacing="0" cellpadding="0">
            <thead>
                <tr>
                    <th width="5%">编号</th>
                    <th width="10%">专栏名称</th>
                    <th width="20%">专栏图片</th>
                    <th width="30%">专栏描述</th>
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
                    <td><?php echo $row["r_name"]; ?></td>
                    <td><?php echo "<img width='90' height='50' src='../column_pic/images/".$row["r_path"]."'/>"; ?></td>
                    <td><?php echo $row["r_desc"]; ?></td>
                    <td align="center">
                        <input type="button" value="修改" class="btn" onclick="editColumn(<?php echo $row['r_id'];?>)">
                        <input type="button" value="删除" class="btn" onclick="delColumn(<?php echo $row['r_id'];?>,'<?php echo $row['r_path'];?>');">
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
        function editColumn(id){
            window.location="editColumn.php?id="+id;
        }
        function delColumn(id,path){
            if(window.confirm("确定删除？")){
                window.location="doAdminAction.php?act=delColumn&id="+id+"&path="+path;
            }
        }
        function addRecommend(){
            window.location="addRecommend.php";
        }
    </script>
</body>
</html>