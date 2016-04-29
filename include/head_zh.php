<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>

桃木剑-<?php 
	//$url = '/taomujian/';
	$url = '/';
	if($_SERVER['PHP_SELF'] == $url .  "index_zh.php" ){
		echo "首页";
	}else if($_SERVER['PHP_SELF'] == $url . "about_us_zh.php"){
		echo "关于我们";
	}else if($_SERVER['PHP_SELF'] == $url . "products_zh.php"){
		echo "产品与服务";
	}else if($_SERVER['PHP_SELF'] == $url . "about_us_zh.php"){
		echo "关于我们";
	}else if($_SERVER['PHP_SELF'] == $url . "case_zh.php"){
		echo "成功案例";
	}else if($_SERVER['PHP_SELF'] == $url . "contact_us_zh.php"){
		echo "联系我们";
	}
	 ?>


</title>
<link rel="stylesheet" type="text/css" href="style/Core/reset.css">
<link rel="stylesheet" type="text/css" href="style/Core/common.css">
<link rel="stylesheet" type="text/css" href="style/index.css">
<script src=" js/jquery-1.7.2.min.js"></script>
</head>

<body>
 
	<div class="head f-oh">
    	<div class="head_center g-full-center">
        	<a class="logo f-fl" href="index_zh.php">桃木剑</a>
            <dl class="f-fr f-oh language">
            	<dd class="f-fl zh"><a  href="index_zh.php">中文</a></dd>
                <dd class="f-fl"><a href="index.php">ENGLISH</a></dd>
            </dl>
        </div>
    </div>
    
   
   <div class="nav">
   		<ul class="g-full-center f-oh  nav_wrap">
        	<li class="first_icon f-fl"><em></em></li>
            <li class="f-fl"><a class="<?php if($_SERVER['PHP_SELF'] == "/taomujian/index_zh.php" ){ echo "on";} ?>" href="index_zh.php">首页</a></li>
            <li class="f-fl"><a class="<?php if($_SERVER['PHP_SELF'] == "/taomujian/about_us_zh.php" ){ echo "on";} ?>" href="about_us_zh.php">公司简介</a></li>
            <li class="f-fl"><a  class="<?php if($_SERVER['PHP_SELF'] == "/taomujian/products_zh.php" ){ echo "on";} ?>"  href="products_zh.php">产品与服务</a></li>
            <li class="f-fl"><a class="<?php if($_SERVER['PHP_SELF'] == "/taomujian/case.php_zh" ){ echo "on";} ?>" href="case_zh.php">成功案例</a></li>
            <li class="f-fl"><a class="<?php if($_SERVER['PHP_SELF'] == "/taomujian/contact_us_zh.php" ){ echo "on";} ?>" href="contact_us_zh.php">联系我们</a></li>
        </ul>
   </div>