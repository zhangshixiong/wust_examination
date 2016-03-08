<?php
//文件显示页面
    require_once("../include.php");
    $page = isset($_GET['page'])?$_GET['page']:1;
    $pageSize=5;
    $rows = getAllFilesByPage($page,$pageSize);
    if(!$rows){
        alertMes("当前没有文件,请先添加","a_upload_file.php");
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
                <input type="button" value="添&nbsp;&nbsp;加" class="add"  onclick="addfile();">
            </div>
                
        </div>
        <!--表格-->
        <table class="table" cellspacing="0" cellpadding="0">
            <thead>
                <tr>
                    <th width="5%">编号</th>
                    <th width="10%">文件名称</th>
                    <th width="10%">文件类型</th>
                    <th width="25%">文件路径</th>
                    <th width="5%">下载次数</th>
                    <th width="7%">文件大小</th>
                     <th width="10%">所在学院</th>
                    <th width="10%">上传时间</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($rows as $row):?>
                <?php 
                //获得文件信息并显示
                    $sql = "select c_name from exam_classify where c_id=".$row['f_institute'];
                    $result = mysql_query($sql);
                    $type = mysql_fetch_assoc($result);
                ?>
                <tr>
                    <td><?php echo $row['f_id'];?></td>
                    <td><?php echo $row['f_name'];?></td>
                    <td><?php echo $type['c_name'];?></td>
                    <td><?php echo $row['f_path'];?></td>
                    <td><?php echo $row['f_dltimes'];?></td>
                    <td><?php echo transByte($row['f_size']);?></td>
                    <td><?php echo $row['f_institute'];?></td>
                    <td><?php echo $row['f_time'];?></td>
                    <td>
                        <input type="button" value= "删除" class="btn" 
                        onclick="delFile(<?php echo $row['f_id'];?>,'<?php echo $row['f_path'];?>')" />
                    </td>
                </tr>
                <?php endforeach;?>
                <?php if($totalRows>$pageSize):?>
                <tr>
                    <td colspan="8">
                        <?php echo showPage($page,$totalPage); ?>
                    </td>
                </tr>
                <?php endif;?>
            </tbody>
        </table>
    </div>
    <script type="text/javascript">
        function addfile(){
            window.location="a_upload_file.php";
        }
        function delFile(id,path){
            window.location="doAdminAction.php?act=delFile&id="+id+"&f_path="+path;
        }
    </script>
</body>
</html>