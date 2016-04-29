<?php @session_start();?>
<META http-equiv=Content-Type content="text/html; charset=utf-8">
<LINK href="Images/style.css" type=text/css rel=stylesheet>
<TABLE cellSpacing=0 cellPadding=0 width="100%" border=0  name="Trans" id="Trans" >
  <TBODY>
    <TR>
      <TD width=257><img src="Images/cc.gif" /></TD>
      <TD vAlign=top width=15 background=Images/admin-top2.gif><IMG 
      height=71 src="Images/admin-top1.gif" width=15></TD>
      <TD background=Images/admin-top2.gif nowrap >管理员： <B><FONT  
      color=#ff4800><?php echo $_SESSION["login_adminname"] ;?></FONT></B>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</TD>
      <TD  nowrap background=Images/admin-top2.gif  width="120" align="left" >后台管理首页</TD>
      <TD align=right background=Images/admin-top2.gif id="DateTime"><script> 
         setInterval("DateTime.innerHTML=new Date().toLocaleString()",1000);
      </script></TD>
      <TD vAlign=top width=19 background=Images/admin-top2.gif><IMG 
      height=71 src="Images/admin-top3.gif" width=19></TD>
    </TR>
  </TBODY>
</TABLE>
