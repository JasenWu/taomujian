<?php include("CheckAdmin.php")?>
<HTML>
<HEAD>
<TITLE></TITLE>
<META http-equiv=Content-Type content="text/html; charset=utf-8">
<link rel="stylesheet" href="Images/style.css">
<script language="javascript" src="Script/Admin.js"></script>
<script>
function closewin() {
   if (opener!=null && !opener.closed) {
      opener.window.newwin=null;
      opener.openbutton.disabled=false;
      opener.closebutton.disabled=true;
   }
}
var count=0;//做计数器
var limit=new Array();//用于记录当前显示的哪几个菜单
var countlimit=1;//同时打开菜单数目，可自定义
function expandIt(el) {
   obj = eval("sub" + el);
   if (obj.style.display == "none") {
      obj.style.display = "block";//显示子菜单
      if (count<countlimit) {//限制2个
         limit[count]=el;//录入数组
         count++;
      }
      else {
         eval("sub" + limit[0]).style.display = "none";
         for (i=0;i<limit.length-1;i++) {limit[i]=limit[i+1];}//数组去掉头一位，后面的往前挪一位
         limit[limit.length-1]=el;
      }
   }
   else {
      obj.style.display = "none";
      var j;
      for (i=0;i<limit.length;i++) {if (limit[i]==el) j=i;}//获取当前点击的菜单在limit数组中的位置
      for (i=j;i<limit.length-1;i++) {limit[i]=limit[i+1];}//j以后的数组全部往前挪一位
      limit[limit.length-1]=null;//删除数组最后一位
      count--;
   }
}
</script>
<META content="MSHTML 6.00.2900.3199" name=GENERATOR>
</HEAD>
<BODY onmouseover="self.status='方便.实用.创新.客户满意!';return true">
<TABLE height="100%" cellSpacing=0 cellPadding=0 width=257 border=0>
  <TBODY>
    <TR>
      <TD vAlign=top align=middle background=Images/admin-leftbg.gif>
          <?php  left_menu() ?>  
        
          
           <div id="main100" onclick=expandIt(100)>
          <table style="BORDER-RIGHT: #ddedf6 1px solid; BORDER-TOP: #ddedf6 1px solid; BORDER-LEFT: #ddedf6 1px solid; BORDER-BOTTOM: #ddedf6 1px solid; BACKGROUND-COLOR: #ffffff" 
            height=25 cellSpacing=5 cellPadding=0 width=170 border=0 align="center">
            <tr style="cursor: hand;">
              <td width="17" ><strong><IMG src="Images/cms-ico3.gif" 
                  align=absMiddle></strong></td>
              <td class="SystemLeft">系统管理</td>
            </tr>
          </table>
        </div>
        
        
        <div id="sub100" style="display:none">
          <table width="160" border="0" cellspacing="0"  cellpadding="0"align="center" >
            <tr>
              <td width="36" height="22"></td>
              <td class="SystemLeft"><IMG src="Images/plus-.gif" align=absMiddle border="0"><a href="AdminEdit.php?Result=Add" target="mainFrame" onClick='changeAdminFlag("添加用户")'> 添加用户</a></td>
            </tr>
            <tr>
              <td width="36" height="22"></td>
              <td class="SystemLeft"><IMG src="Images/plus-.gif" align=absMiddle border="0"><a href="AdminList.php" target="mainFrame" onClick='changeAdminFlag("用户管理")'> 用户管理</a></td>
            </tr>
		   
            <tr>
              <td width="36" height="22"></td>
              <td class="SystemLeft"><a href="CategorySort.php" target="mainFrame" onClick='changeAdminFlag("类别设置")'><IMG src="Images/plus-.gif" align=absMiddle border="0"> 类别设置</a></td>
           </tr>
           
           <tr>
              <td width="36" height="22"></td>
              <td class="SystemLeft"><IMG src="Images/plus-.gif" align=absMiddle border="0"><a href="MenuSort.php" target="mainFrame" onClick='changeAdminFlag("栏目设置")'> 栏目设置</a></td>
            </tr>
         
          </table>
        </div>
     
        <table style="BORDER-RIGHT: #ddedf6 1px solid; BORDER-TOP: #ddedf6 1px solid; BORDER-LEFT: #ddedf6 1px solid; BORDER-BOTTOM: #ddedf6 1px solid; BACKGROUND-COLOR: #ffffff" 
            height=25 cellSpacing=5 cellPadding=0 width=170 border=0 align="center">
          <tr style="cursor: hand;">
            <td width="17">&nbsp;</td>
            <td class="SystemLeft"><a href="javascript:AdminOut()">退出登录</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="SysCome.php" target="mainFrame" onClick='changeAdminFlag("后台主页")'>后台主页</a></td>
          </tr>
        </table>
        <table style="BORDER-RIGHT: #ddedf6 1px solid; BORDER-TOP: #ddedf6 1px solid; BORDER-LEFT: #ddedf6 1px solid; BORDER-BOTTOM: #ddedf6 1px solid; BACKGROUND-COLOR: #ffffff" 
            height=25 cellSpacing=5 cellPadding=0 width=170 border=0 align="center">
          <tr style="cursor: hand;">
            <td width="17">&nbsp;</td>
            <td class="SystemLeft" align="center"><a href="../index.php" target="_blank">前台主页</a></td>
          </tr>
        </table></TD>
    </TR>
  </TBODY>
</TABLE>
</BODY>
</HTML>
<?php
function left_menu(){
   $sql="select sortname,id from jp_menu_sort where parentid=0 order by px asc" ;
   $result=$GLOBALS["db"]->query($sql);
   $i=1;
   while($rs=$GLOBALS["db"]->fetch_assoc($result))
   {
	  extract($rs); 
	  echo "<div id='main$i'  onclick=expandIt($i)>";
	  echo "<table style='BORDER-RIGHT:#ddedf6 1px solid;BORDER-TOP:#ddedf6 1px solid;BORDER-LEFT:#ddedf6 1px solid;BORDER-BOTTOM:#ddedf6 1px solid;BACKGROUND-COLOR:#ffffff' height=25 cellSpacing=5 cellPadding=0 width=170 border=0 align='center'>";
	  echo "<tr style='cursor: hand;'>";
	  echo "<td width='17' ><strong><IMG src='Images/cms-ico1.gif' align=absMiddle></strong></td><td class='SystemLeft'>$sortname</td>";
	  echo "</tr>";
	  echo "</table>";
	  echo "</div>";
	  echo "<div id='sub$i'  style='display:none'>";
	  echo "<table width='160' border='0' cellspacing='0' cellpadding='0' align='center'>";
	  $sql1="select sortname,id,url from jp_menu_sort where parentid=$id order by px asc " ;
	  $result1=$GLOBALS["db"]->query($sql1);
	  while($rs1=$GLOBALS["db"]->fetch_assoc($result1))
	  {
		 extract($rs1);
		 ($url=="AboutEdit.php" ||$url=="AboutEdit1.php" ||$url=="AboutEdit2.php")?$url.="?id=".$id:"";
		 echo "<tr>";
		 echo "<td width='36' height='22'></td><td class='SystemLeft'><IMG src='Images/plus-.gif' align=absMiddle border='0'><a href='$url' target='mainFrame' onClick=\"changeAdminFlag('$sortname')\"> $sortname</a></td>";
		 echo "</tr>";
	  }
	  echo "</table>";
	  echo "</div> ";	
	  $i++;  
   }
}
?> 