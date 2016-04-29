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
    if(document.editForm.AdminName.value==""){alert("请填写管理员帐号");document.editForm.AdminName.focus();return false;}
	return true;
 }
</script>
</HEAD>
<BODY>
<?php
@$ID=$_GET["ID"];
@$Result=$_GET["Result"];
AdminEdit($ID) ;
if(!isset($AdminName)){$AdminName="";}
if(!isset($AddTime)){$AddTime="";}
?>

<br>
<table width="100%"  border="1" style="border:#6298E1 tthin solid;" cellpadding="3" cellspacing="1" class="input">
  <form name="editForm" method="post" action="AdminEdit.php?Action=SaveEdit&Result=<?php echo $Result ?>&ID=<?php echo $ID ?>"  onSubmit="return check_add();" >
    <tr>
      <td height="24" nowrap ><table width="100%" border="0" cellpadding="0" cellspacing="0"   idth="100%">
          <tr>
            <td width="120" height="20" align="right">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="20" align="right">登&nbsp;录&nbsp;名：</td>
            <td><input class="textfield" id="AdminName" maxlength="50" name="AdminName" style="WIDTH: 300px;" value="<?php echo $AdminName;?>"></td>
          </tr>
          <tr>
            <td height="20" align="right">密&nbsp;&nbsp;&nbsp;&nbsp;码：</td>
            <td><input class="textfield" id="Password" maxlength="50" type="password" name="Password" style="WIDTH: 300px;" ></td>
          </tr>
          
          <tr>
            <td height="20" align="right">添加日期：</td>
            <td><input name="AddTime" type="text" class="textfield" id="AddTime" style="WIDTH: 240;"  
		  <?php
		    if($AddTime){  
		        echo "value='". date('Y-m-d H:i:s',$AddTime) ."'" ;
			 }else{ 
			    echo "value='". date('Y-m-d H:i:s') ."'" ; 
			 }  
		   ?>  maxlength="100"></td>
          </tr>
          <tr>
            <td height="30" align="right">&nbsp;</td>
            <td valign="bottom"><input name="submitSaveEdit" type="submit" class="button"  id="submitSaveEdit" value="保存" style="WIDTH: 80;" ></td>
          </tr>
          <tr>
            <td height="20" align="right">&nbsp;</td>
            <td valign="bottom">&nbsp;</td>
          </tr>
        </table></td>
    </tr>
  </form>
</table>
<br><Br>
</BODY>
</HTML>
<?php
function AdminEdit($ID){
   @$Action=$_GET["Action"];
   @$Result=$_GET["Result"];
   if($Action=="SaveEdit"){  //添加修改数据
     $AdminName=strtolower($_POST["AdminName"]);
	 $Password=$_POST["Password"];
	 $AddTime=$_POST["AddTime"];
	 if($Result=="Add"){	
	    //判断帐号是否已经注册开始
	    $sql="select id from `jp_admin` where adminname ='$AdminName' " ;
        $reg=$GLOBALS["db"]->getOne($sql);
        if($reg){echo "<script>alert('该帐号已经注册过了，请换一个');history.back();</script>";exit();}
		//判断帐号是否已经注册结束
		$sql="insert into `jp_admin` set adminname='$AdminName',add_time='".strtotime($AddTime)."',password='".md5($Password."webstar")."' " ;
		$GLOBALS["db"]->query($sql);
	 }elseif($Result=="Modify"){
		//判断帐号是否已经注册开始
	    $sql="select id from `jp_admin` where AdminName='$AdminName' and id<>".$ID ;
        $reg=$GLOBALS["db"]->getOne($sql);
        if($reg){echo "<script>alert('该帐号已经注册过了，请换一个');history.back();</script>";exit();}
		//判断帐号是否已经注册结束
	    $sql="update `jp_admin` set adminname='$AdminName',add_time='".strtotime($AddTime)."' " ;
		if($Password){$sql=$sql." ,password='".md5($Password."webstar")."' ";}
		$sql=$sql." where id=".$ID ;
		$GLOBALS["db"]->query($sql);
	 }
	 echo "<script>alert('成功编辑管理员信息！');location.href='AdminList.php';</script>";
  }else{   //提取信息
     //$Types="";
     if($Result=="Modify"){
	    $sql="select * from `jp_admin` where id=". $ID ;
		@$result=$GLOBALS["db"]->query($sql);
	    @$yz=is_array($row=$GLOBALS["db"]->fetch_assoc($result));
	    if($yz){  
		     global $AdminName,$AddTime ;
			 extract($row);
			 $AdminName=$adminname ;
			 $AddTime=$add_time;
		}
	 }
  }
}

?>