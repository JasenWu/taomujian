<?php /* Smarty version Smarty-3.0.5, created on 2014-06-15 02:14:37
         compiled from "C:\wamp\www\jp/templates\product.html" */ ?>
<?php /*%%SmartyHeaderCode:8744539d018ddf01e4-15998838%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b06c59ac7a46f69e2fab6dd8d327025b303ef02b' => 
    array (
      0 => 'C:\\wamp\\www\\jp/templates\\product.html',
      1 => 1361805136,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8744539d018ddf01e4-15998838',
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
   <div class="location"><h1><font class="img_left">产品展示 <span>products</span></font> <div class="location_rightwz"><img src="images/Icon_1.gif" class="img_left" width="15" height="11"  /><a href="index.php">首页</a> > 产品展示</div></h1></div>
   <?php $_template = new Smarty_Internal_Template("_left_pro.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
  <div class="n_right"> 
  <h2><font class="img_left">products <span>产品展示</span></font></h2>
   <h3>product show</h3>
  <div class="product">
                    <ul>
                     <?php if ($_smarty_tpl->getVariable('info_reslut')->value==''){?> 
              <span style="color:#666;">暂无添加 </span> 
         <?php }else{ ?>    
             <?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['rs']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['rs']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('info_reslut')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['rs']['name'] = 'rs';
$_smarty_tpl->tpl_vars['smarty']->value['section']['rs']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['rs']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['rs']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['rs']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['rs']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['rs']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['rs']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['rs']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['rs']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['rs']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['rs']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['rs']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['rs']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['rs']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['rs']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['rs']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['rs']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['rs']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['rs']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['rs']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['rs']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['rs']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['rs']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['rs']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['rs']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['rs']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['rs']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['rs']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['rs']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['rs']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['rs']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['rs']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['rs']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['rs']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['rs']['total']);
?>
                
                  
                  <li><span><a href="product_show_<?php echo $_smarty_tpl->getVariable('info_reslut')->value[$_smarty_tpl->getVariable('smarty')->value['section']['rs']['index']]['id'];?>
.html"><img src="/jp<?php echo $_smarty_tpl->getVariable('info_reslut')->value[$_smarty_tpl->getVariable('smarty')->value['section']['rs']['index']]['type1'];?>
" /></a></span><span class="product_text"><a href="product_show_<?php echo $_smarty_tpl->getVariable('info_reslut')->value[$_smarty_tpl->getVariable('smarty')->value['section']['rs']['index']]['id'];?>
.html"><?php echo $_smarty_tpl->getVariable('info_reslut')->value[$_smarty_tpl->getVariable('smarty')->value['section']['rs']['index']]['product_name'];?>
</a></span></li>
                 
                 
             <?php endfor; endif; ?>  
         <?php }?>    
                   
                    </ul>
                    </div>
    <div class="megas512">
	<?php echo $_smarty_tpl->getVariable('showpage')->value;?>
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
