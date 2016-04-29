<?php include("CheckAdmin.php")?>
<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<META NAME="copyright"   />
<META NAME="Author"   />
<META NAME="Keywords" CONTENT="" />
<META NAME="Description" CONTENT="" />
<TITLE>编辑新闻</TITLE>
<LINK href="Images/style.css" type=text/css rel=stylesheet>
<script language="javascript" src="Script/Admin.js"></script>
<script language="javascript" >
 function check_add(){
    if(document.editForm.NewsNameSi.value==""){alert("请填写新闻标题");document.editForm.NewsNameSi.focus();return false;}
	if(document.editForm.SortID.value==""){alert("请选择新闻类别");return false;}
	return true;
 }
</script>
</HEAD>
<BODY>
<?php
@$ID=$_GET["ID"];
@$Result=$_GET["Result"];
ResumeEdit($ID) ;
?>

<br>
<table width="100%"  border="1" style="border:#6298E1 tthin solid;" cellpadding="3" cellspacing="1" class="input">
  
    <tr>
      <td height="24" nowrap ><table width="100%" border="0" cellpadding="0" cellspacing="0"   idth="100%">
          <tr>
            <td width="120" height="20" align="right">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="20" align="right">应聘职位：</td>
            <td><?php echo $jobs?></td>
          </tr>
          <tr>
            <td height="20" align="right">姓名：</td>
            <td><?php echo $names?></td>
          </tr>
          <tr>
            <td height="20" align="right">民族：</td>
            <td><?php echo $other[0]?></td>
          </tr>
          <tr>
            <td height="20" align="right">性别：</td>
            <td><?php echo $other[1]?></td>
          </tr>
          <tr>
            <td height="20" align="right">出生日期：</td>
            <td><?php echo $other[2]?>年<?php echo $other[3]?>月<?php echo $other[4]?>日</td>
          </tr>

          
          <tr>
            <td height="20" align="right">健康状况：</td>
            <td><?php echo $other[5]?></td>
          </tr>
          <tr>
            <td height="20" align="right">婚姻状况：</td>
            <td><?php echo $other[6]?></td>
          </tr>
          <tr>
            <td height="20" align="right">户口所在：</td>
            <td><?php echo $other[7]?></td>
          </tr>
          <tr>
            <td height="20" align="right">身份证号：</td>
            <td><?php echo $other[8]?></td>
          </tr>
          <tr>
            <td height="20" align="right">现住地址：</td>
            <td><?php echo $other[9]?></td>
          </tr>
          <tr>
            <td height="20" align="right">邮政编码：</td>
            <td><?php echo $other[10]?></td>
          </tr>
          <tr>
            <td height="20" align="right">学历：</td>
            <td><?php echo $other[11]?></td>
          </tr>
          <tr>
            <td height="20" align="right">毕业院校：</td>
            <td><?php echo $other[12]?></td>
          </tr>
          <tr>
            <td height="20" align="right">毕业时间：</td>
            <td><?php echo $other[13] ?></td>
          </tr>
          <tr>
            <td height="20" align="right">所学专业：</td>
            <td><?php echo $other[14]?></td>
          </tr>
          <tr>
            <td height="20" align="right">月薪要求：</td>
            <td><?php echo $other[15]?></td>
          </tr>
          <tr>
            <td height="20" align="right">联系电话：</td>
            <td><?php echo $other[16]?></td>
          </tr>
          <tr>
            <td height="20" align="right">电子邮箱：</td>
            <td><?php echo $other[17]?></td>
          </tr>
          <tr>
            <td height="20" align="right">其他备注：</td>
            <td><?php echo $qtbz?></td>
          </tr>
          <tr>
            <td height="20" align="right">投递日期：</td>
            <td><?php echo date('Y-m-d',$add_time)?></td>
          </tr>
          <tr>
            <td height="30" align="right">&nbsp;</td>
            <td valign="bottom"><input name="submitSaveEdit" type="button" class="button"  id="submitSaveEdit" value="返回" style="WIDTH: 80;"  onClick="javascript:location.href='ResumeList.php'"></td>
          </tr>
          <tr>
            <td height="20" align="right">&nbsp;</td>
            <td valign="bottom">&nbsp;</td>
          </tr>
        </table></td>
    </tr>

</table>
<br><Br>
</BODY>
</HTML>
<?php
function ResumeEdit($ID){
   @$Action=$_GET["Action"];
   $Result=$_GET["Result"];

     if($Result=="Modify"){
	    $sql="select * from jp_resume where id=". $ID ;
		@$result=$GLOBALS["db"]->query($sql);
	    @$yz=is_array($row=$GLOBALS["db"]->fetch_assoc($result));
		 if($yz){
		     global $jobs,$names,$other,$qtbz,$add_time;
			 $jobs=$row["resume_name"] ;
			 $names=$row["type1"] ;
			 $type1=explode("|",$row["type2"]) ;
			 $other[]=$type1[0];
			 $other[]=$type1[1];
			 $other[]=$type1[2];
			 $other[]=$type1[3];
			 $other[]=$type1[4];
			 $other[]=$type1[5];
			 $other[]=$type1[6];
			 $other[]=$type1[7];
			 $other[]=$type1[8];
			 $other[]=$type1[9];
			 $other[]=$type1[10];
			 $other[]=$type1[11];
			 $other[]=$type1[12];
			 $other[]=$type1[13];
			 $other[]=$type1[14];
			 $other[]=$type1[15];
			 $other[]=$type1[16];
			 $other[]=$type1[17];
			 $other[]=$type1[18];
			 $add_time=$row["add_time"] ;
			 $qtbz=$row["type3"] ;
			 $GLOBALS["db"]->query("update jp_resume set viewflag=1 where id=".$ID);
		}

  }
}
