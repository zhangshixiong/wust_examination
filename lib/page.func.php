<?php
	function showPage($page,$totalPage,$where=null,$sep="&nbsp;"){
		$where = $where==null ? null:"&".$where; 
		$url = $_SERVER['PHP_SELF'];
		$p='';
		for($i=1;$i<=$totalPage;$i++){
			if($page == $i){
				$p.="[".$i."]";
			}else{
				$p.="<a href='".$url."?page=".$i.$where."'>[".$i."]</a>";
			}
		}

		$index = $page==1 ? "首页":"<a href='".$url."?page=1".$where."'>首页<a>";
		$last = $page==$totalPage ? "尾页":"<a href='".$url."?page=".$totalPage.$where."'>尾页</a>";
		$prev = $page==1 ? "上一页":"<a href='".$url."?page=".($page-1).$where."'>上一页</a>";
		$next = $page==$totalPage ? "下一页":"<a href='".$url."?page=".($page+1).$where."'>下一页</a>";
		$str = $page."/".$totalPage;

		$showpage = $str.$sep.$sep.$index.$sep.$prev.$sep.$sep.$sep.$sep.$p.$sep.$sep.$sep.$sep.$next.$sep.$last;
		return $showpage;
	}
?>