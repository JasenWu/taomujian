<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>

桃木剑-<?php 
	//$url = '/taomujian/';
	$url = '/';
	if($_SERVER['PHP_SELF'] == $url .  "index.php" ){
		echo "首页";
	}else if($_SERVER['PHP_SELF'] == $url . "about_us.php"){
		echo "关于我们";
	}else if($_SERVER['PHP_SELF'] == $url . "products.php"){
		echo "产品与服务";
	}else if($_SERVER['PHP_SELF'] == $url . "about_us.php"){
		echo "关于我们";
	}else if($_SERVER['PHP_SELF'] == $url . "case.php"){
		echo "成功案例";
	}else if($_SERVER['PHP_SELF'] == $url . "contact_us.php"){
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
        	<a class="logo f-fl" href="index.php">桃木剑</a>
            <dl class="f-fr f-oh language">
            	<dd class="f-fl zh"><a  href="index_zh.php">中文</a></dd>
                <dd class="f-fl"><a href="index.php">ENGLISH</a></dd>
            </dl>
        </div>
    </div>
    
   
   <div class="nav">
   		<ul class="g-full-center f-oh  nav_wrap">
        	<li class="first_icon f-fl"><em></em></li>
            <li class="f-fl"><a class="<?php if($_SERVER['PHP_SELF'] == "/taomujian/index.php" ){ echo "on";} ?>" href="index.php">首页</a></li>
            <li class="f-fl"><a class="<?php if($_SERVER['PHP_SELF'] == "/taomujian/about_us.php" ){ echo "on";} ?>" href="about_us.php">公司简介</a></li>
            <li class="f-fl"><a  class="<?php if($_SERVER['PHP_SELF'] == "/taomujian/products.php" ){ echo "on";} ?>"  href="products.php">产品与服务</a></li>
            <li class="f-fl"><a class="<?php if($_SERVER['PHP_SELF'] == "/taomujian/case.php" ){ echo "on";} ?>" href="case.php">成功案例</a></li>
            <li class="f-fl"><a class="<?php if($_SERVER['PHP_SELF'] == "/taomujian/contact_us.php" ){ echo "on";} ?>" href="contact_us.php">联系我们</a></li>
        </ul>
</div>