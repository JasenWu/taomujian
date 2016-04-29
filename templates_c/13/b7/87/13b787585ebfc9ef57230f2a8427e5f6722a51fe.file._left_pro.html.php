<?php /* Smarty version Smarty-3.0.5, created on 2014-06-15 02:14:37
         compiled from "C:\wamp\www\jp/templates\_left_pro.html" */ ?>
<?php /*%%SmartyHeaderCode:27457539d018df0a696-96316012%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '13b787585ebfc9ef57230f2a8427e5f6722a51fe' => 
    array (
      0 => 'C:\\wamp\\www\\jp/templates\\_left_pro.html',
      1 => 1361805086,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '27457539d018df0a696-96316012',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="n_left"><div class="n_left_list">
                  <ul>
                    <?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['rs']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['rs']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('product_srot')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
      <li><a href="product_<?php echo $_smarty_tpl->getVariable('product_srot')->value[$_smarty_tpl->getVariable('smarty')->value['section']['rs']['index']]['id'];?>
.html" <?php if ((($tmp = @$_smarty_tpl->getVariable('a_id')->value)===null||$tmp==='' ? "0" : $tmp)==$_smarty_tpl->getVariable('product_srot')->value[$_smarty_tpl->getVariable('smarty')->value['section']['rs']['index']]['id']){?>class="current"<?php }?>><?php echo $_smarty_tpl->getVariable('product_srot')->value[$_smarty_tpl->getVariable('smarty')->value['section']['rs']['index']]['sortname'];?>
</a></li>
      <?php endfor; endif; ?>
                                      
                  </ul>
                  </div>
                  <div style="text-align:center; padding-left:6px;"><div class="ny_title"><a href="messages.php"><img class="img_left"   src="images/tle_tu.jpg" width="210" height="100" /></a></div><div style="display:block;"></div></div>
    </div>