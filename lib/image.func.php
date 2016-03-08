<?php
	require_once("string.func.php");

	//创建验证码
	function verifyImage($type=3,$length=4,$pixel=50,$line=2,$sess_name = "verify"){
		session_start();
		//通过gd库创建画布
			$width = 80;
			$height = 28;
			$image = imagecreatetruecolor($width, $height);
		//为画布分配颜色
			$white = imagecolorallocate($image, 255, 255, 255);
			$black = imagecolorallocate($image, 0, 0, 0);
		//用颜色填充画布
			imagefilledrectangle($image, 1, 1, $width-2, $height-2, $white);
		//获取字符
			$chars = buildRandomString($type,$length);
			$_SESSION[$sess_name] = $chars;
		//一个个的写字符
			$fontfiles = array("FZSTK.TTF","simkai.ttf","SIMLI.TTF","STXINGKA.TTF");
			for($i = 0;$i < $length;$i ++){
				$size = mt_rand(12,19);
				$angle = mt_rand(-30,30);
				$x = 5 + $i*$size;
				$y = mt_rand(17,23);
				$color = imagecolorallocate($image, mt_rand(40,200), mt_rand(40,200), mt_rand(0,255));
				$fontfile = "../fonts/".$fontfiles[mt_rand(0,count($fontfiles)-1)];
				$text = substr($chars, $i,1);
				imagettftext($image, $size, $angle, $x, $y, $color, $fontfile, $text);
			}
		//画干扰线和干扰点		
			if($pixel){
				for($i = 0;$i < $pixel;$i ++){
					$color1 = imagecolorallocate($image, mt_rand(0,255), mt_rand(0,255), mt_rand(0,255));
					imagesetpixel($image, mt_rand(0,$width-1), mt_rand(0,$height-1), $color1);
				}
			}
			if($line){
				for($i = 0;$i < $line;$i ++){
					$color = imagecolorallocate($image, mt_rand(0,255), mt_rand(0,255), mt_rand(0,255));
					imageline($image, mt_rand(0,$width-1), mt_rand(0,$height-1), mt_rand(0,$width-1), mt_rand(0,$height-1), $color);
				}
			}
		//响应画布
			ob_clean();
			header("content-type:image/gif");
			imagegif($image);
			imagedestroy($image);
	}


	//生成缩略图
	// $filename = "1.jpg";
	// thumb($filename,"images/".$filename);
	function thumb($filename,$destination=null,$dst_w=null,$dst_h=null,$scale=0.5,$isReserved=1){
		list($src_w,$src_h,$imagetype) = getimagesize($filename);

		if(is_null($dst_w) || is_null($dst_h)){
			$dst_w = $src_w * $scale;
			$dst_h = $src_h * $scale;
		}
		$mime = image_type_to_mime_type($imagetype);
		$createFun = str_replace('/', "createfrom", $mime);
		$outFun = str_replace('/', null, $mime);
		$src_image = $createFun($filename);
		$dst_image = imagecreatetruecolor($dst_w, $dst_h);
		imagecopyresampled($dst_image, $src_image, 0, 0, 0, 0, $dst_w, $dst_h, $src_w, $src_h);

		if($destination && !file_exists(dirname($destination))){
			mkdir(dirname($destination));
		}

		$dstFilename = $destination==null?getUniName().".".$filename:$destination;
		$outFun($dst_image,$dstFilename);
		imagedestroy($dst_image);
		imagedestroy($src_image);

		if(!$isReserved){
			unlink($filename);
		}

		return $dstFilename;
	}

	//生成文字水印图像
	// $filename = "../images/userhead.jpg";
	// waterText($filename);
	function waterText($filename,$text="bangbang",$fontfile="STXINGKA.TTF"){
		$fileInfo = getimagesize($filename);
		$mime = $fileInfo['mime'];
		$createFun = str_replace('/', "createfrom", $mime);
		$outFun = str_replace('/', null, $mime);
		$image = $createFun($filename);
		$color = imagecolorallocatealpha($image, 255, 0, 0, 60); 
		$fontfile = "../fonts/".$fontfile;
		imagettftext($image, 14, 0, 0, 14, $color, $fontfile, $text);
		$outFun($image,$filename);
		imagedestroy($image);
	}

	//生成水印图片
	// $srcFile = "3.jpg";
	// $dstFile = "apic484_s.jpg";
	// waterPic($dstFile,$srcFile);
	function waterPic($dstFile,$srcFile="../images/logo.jpg",$pct = 40){
		$srcFileInfo = getimagesize($srcFile);
		$dstFileInfo = getimagesize($dstFile);
		$src_w = $srcFileInfo[0];
		$src_h = $srcFileInfo[1];
		$srcMime = $srcFileInfo['mime'];
		$dstMime = $dstFileInfo['mime'];
		$createSrcFun = str_replace('/', "createfrom", $srcMime);
		$createDstFun = str_replace('/', "createfrom", $dstMime);
		$outDstFun = str_replace('/', null, $dstMime);
		$src_im = $createSrcFun($srcFile);
		$dst_im = $createDstFun($dstFile);
		imagecopymerge($dst_im, $src_im, 0, 0, 0, 0, $src_w, $src_h, $pct);
		$outDstFun($dst_im,$dstFile);
		imagedestroy($src_im);
		imagedestroy($dst_im);
	}
?>

