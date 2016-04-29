<?php /* Smarty version Smarty-3.0.5, created on 2014-06-15 02:11:20
         compiled from "C:\wamp\www\jp/templates\_left_about.html" */ ?>
<?php /*%%SmartyHeaderCode:4753539d00c81389d4-85886987%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e7cc4bba9e68f7d1f7b76c92aca55895aabe2c2b' => 
    array (
      0 => 'C:\\wamp\\www\\jp/templates\\_left_about.html',
      1 => 1361805083,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4753539d00c81389d4-85886987',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="n_left">
  <div class="n_left_list">
    <ul>
      <?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['rs']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['rs']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('about_list')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
      <li><a href="about_<?php echo $_smarty_tpl->getVariable('about_list')->value[$_smarty_tpl->getVariable('smarty')->value['section']['rs']['index']]['id'];?>
.html" <?php if ((($tmp = @$_smarty_tpl->getVariable('a_id')->value)===null||$tmp==='' ? "0" : $tmp)==$_smarty_tpl->getVariable('about_list')->value[$_smarty_tpl->getVariable('smarty')->value['section']['rs']['index']]['id']){?>class="current"<?php }?>><?php echo $_smarty_tpl->getVariable('about_list')->value[$_smarty_tpl->getVariable('smarty')->value['section']['rs']['index']]['sortname'];?>
</a></li>
      <?php endfor; endif; ?>
    </ul>
  </div>
  <div style="text-align:center; padding-left:6px;">
    <div class="ny_title"><img class="img_left"   src="images/tle_tu.jpg" width="210" height="100" /></div>
    <div style="display:block;"></div>
  </div>
</div>
