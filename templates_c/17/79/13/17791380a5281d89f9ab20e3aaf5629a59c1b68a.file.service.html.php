<?php /* Smarty version Smarty-3.0.5, created on 2014-06-15 02:18:18
         compiled from "C:\wamp\www\jp/templates\service.html" */ ?>
<?php /*%%SmartyHeaderCode:16653539d026a12eb13-70343568%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '17791380a5281d89f9ab20e3aaf5629a59c1b68a' => 
    array (
      0 => 'C:\\wamp\\www\\jp/templates\\service.html',
      1 => 1361805137,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16653539d026a12eb13-70343568',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php $_template = new Smarty_Internal_Template("_title.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
<link href="css/style.css" rel="stylesheet" type="text/css" />
</head>

<body style="background:url(images/body_bg_pro.jpg) center top no-repeat;">
<div class="infobody">
  <?php $_template = new Smarty_Internal_Template("_top.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
 <div class="ny_content">
   <div class="location"><h1><font class="img_left">售后服务 <span>service</span></font> <div class="location_rightwz"><img src="images/Icon_1.gif" class="img_left" width="15" height="11"  /><a href="index.php">首页</a> > <a href="index.php">售后服务</a> > <?php echo (($tmp = @$_smarty_tpl->getVariable('navi')->value[0]['sortname_en'])===null||$tmp==='' ? "免费包装服务" : $tmp);?>
</div></h1></div>
   <?php $_template = new Smarty_Internal_Template("_left_service.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
  <div class="n_right"> 
  <h2><font class="img_left">service <span>售后服务</span></font></h2>
   <h3>packaging services</h3>
  <div class="n_main_wz">
  <?php echo $_smarty_tpl->getVariable('about_content')->value;?>

  </div>
  </div>
  <div class="content_bottom"></div>
 </div> 
<div class="clear"></div>
</div>
<?php $_template = new Smarty_Internal_Template("_foot.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
</body>
</html>
