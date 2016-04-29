<?php @session_start();?>
<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<title>
<MMString:LoadString id="insertbar/linebreak" />
</title>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<META NAME="copyright" CONTENT="Copyright 2004-2008 - yznic.CN-STUDIO" />
<META NAME="Author" CONTENT="维派科技,www.vanpa.com.cn" />
<META NAME="Keywords" CONTENT="" />
<META NAME="Description" CONTENT="" />
<link rel="stylesheet" href="Images/style.css">
</HEAD>
<BODY>
<br><br><br>

<div align="center"><font color="#FF0000"><strong>欢迎使仁杰互联后台管理系统<br>
</strong></font>
<br>
<table width="662" border="0" cellpadding="3" cellspacing="1" class="input" bgcolor="#EBF2F9">
  <tr>
    <td height="24" colspan="2"><img src="Images/Explain.gif" width="18" height="18" border="0" align="absmiddle">&nbsp;<strong>服务器信息</strong></td>
    </tr>
   <tr>
    <td width="50%" height="24" >上次登录时间：<?php echo  date("Y-m-d h:i:s",$_SESSION["last_login_time"]) ?></td>
    <td width="50%" height="24" >上次登录IP：<?php echo $_SESSION["last_login_ip"] ;?></td>
  </tr>
  <tr>
    <td width="50%" height="24" >相关信息：<?php
if(PATH_SEPARATOR==':') echo 'Linux';
else echo 'Windows';
?></td>
    <td width="50%" height="24" >网站信息服务软件和版本：<?php echo $_SERVER['SERVER_PROTOCOL'] ;?></td>
  </tr>
  <tr>
    <td height="24" >客户端操作系统：<?php echo $_SERVER['HTTP_USER_AGENT'] ;?></td>
    <td height="24" >站点物理路径：<?php echo $_SERVER['SCRIPT_FILENAME'] ;?></td>
  </tr>
  <tr>
    <td width="50%" height="24" >域名IP：http://<?php echo $_SERVER['HTTP_HOST']?></td>
    <td width="50%" height="24" >返回服务器处理请求的端口：<?php echo $_SERVER['SERVER_PORT']  ;?></td>
  </tr>
  <tr>
    <td height="24" colspan="2" bgcolor="#D7E4F7">客户端浏览器要求： IE5.5或以上，并关闭所有弹窗的阻拦程序；服务器建议采用：Windows 2000或Windows 2003 Server。</td>
    </tr>
</table>

    </div>
</BODY>
</HTML> 