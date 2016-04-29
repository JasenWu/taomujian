<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>网站管理系统</title>
<link href="Image/southidc.css" rel="stylesheet" type="text/css" />
<script language="javascript">
<!--
function SetFocus()
{
if (document.Login.LoginName.value=="")
	document.Login.LoginName.focus();
else
	document.Login.LoginName.select();
}
function CheckForm()
{
	if(document.Login.LoginName.value=="")
	{
		alert("请输入用户名！");
		document.Login.LoginName.focus();
		return false;
	}
	if(document.Login.LoginPassword.value == "")
	{
		alert("请输入密码！");
		document.Login.LoginPassword.focus();
		return false;
	}
	if (document.Login.CheckCode.value==""){
       alert ("请输入您的验证码！");
       document.Login.CheckCode.focus();
       return(false);
    }
}

//-->
</script>
<SCRIPT LANGUAGE="JavaScript">
	function reloadcode(){
	   var d = new Date();
	   document.getElementById('safecode').src="code.php?t="+d.toTimeString()}
</SCRIPT>
</head>

<body style="background:url(Image/login_03_3.jpg) repeat-x top; color:#433271;" onLoad=" SetFocus() ">
<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td height="69" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="289" rowspan="2" valign="top"><img src="Image/login_03_1.jpg" alt="" /></td>
        <td height="5" style="background:url(Image/login_03_2.jpg) no-repeat left top;"></td>
      </tr>
      <tr>
        <td height="67"><div class="cc04">Power by <a href="http://www.renjie.net.cn" target="_blank">www.zoondong.com</a></div></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td valign="top" class="cc01" align="center"><table width="700" height="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td height="57">&nbsp;</td>
        <td width="2" rowspan="2" class="cc05"></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td width="319" height="300" valign="top" style="background:url(Image/login_03_7.jpg) no-repeat right top;">&nbsp;</td>
        <td valign="top"><table width="340" border="0" cellpadding="0" cellspacing="0" class="cc06">
         <form name="Login" action="CheckLogin.php" method="post" target="_parent" onSubmit="return CheckForm();"><tr>
            <td width="53" height="30">用户名:</td>
            <td colspan="2"><input name="LoginName"  type="text"  id="UserName4" maxlength="20" class="cc07" size="14"  onMouseOver="this.style.background='#E1F4EE';" onMouseOut="this.style.background='#FFFFFF'" onFocus="this.select(); "></td>
            <td width="160"></td>
          </tr>
          <tr>
            <td height="30">密　码:</td>
            <td colspan="2"><input name="LoginPassword"  type="password" maxlength="20" class="cc07" size="14"   onMouseOver="this.style.background='#E1F4EE';" onMouseOut="this.style.background='#FFFFFF'" onFocus="this.select(); "></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="30">验证码:</td>
            <td colspan="2" valign="middle"><input name="CheckCode"  type="text" maxlength="4" class="cc07" size="6"   onMouseOver="this.style.background='#E1F4EE';" onMouseOut="this.style.background='#FFFFFF'" onFocus="this.select(); ">&nbsp;&nbsp;<span style=" padding:0px; margin:0px; cursor:pointer;"><img src='code.php' id="safecode" onClick="reloadcode()" title="看不清楚?点击切换!" ></span></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="30"></td>
            <td width="58"><input name="Submit" type="Image" value="提交" src="Image/loginBtn.jpg" /></td>
            <td width="69"></td>
            <td></td>
          </tr></form>
        </table></td>
      </tr>
      <tr>
        <td colspan="3" align="center" valign="top"><table width="70%" border="0" cellpadding="0" cellspacing="0" class="cc11">
            <tr>
              <td height="20">&nbsp;</td>
              </tr>
            <tr>
              <td align="center">系统提示您的IP为<span class="cc10">
			  <?php get_client_ip();?>
			   </span>，如因IP锁定无法登录，请与管理员联系！</td>
              </tr>
            <tr>
              <td height="20">&nbsp;</td>
            </tr>
          </table></td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td height="24" valign="top" background="Image/login_03_12.jpg"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
	  <tr>
		<td height="2" valign="top" class="cc02"></td>
	  </tr>
	  <tr>
		<td height="24" align="center" class="cc08">系统名称：网站管理系统(WMS) 
</td>
	  </tr>
    </table></td>
  </tr>
</table>
<script language="JavaScript" type="text/JavaScript">
SetFocus(); 
</script>
</body>
</html>
<?php
function get_client_ip()   //获取ip
{ 
global $_SERVER; 
if (isset($_SERVER["HTTP_X_FORWARDED_FOR"]))  
{ 
$realip = $_SERVER["HTTP_X_FORWARDED_FOR"]; 
} 
elseif (isset($_SERVER["HTTP_CLIENT_IP"]))  
{ 
$realip = $_SERVER["HTTP_CLIENT_IP"]; 
} 
else  
{ 
$realip = $_SERVER["REMOTE_ADDR"]; 
} 
echo $realip; 
} 
?>

