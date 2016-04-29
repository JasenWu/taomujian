<?php include("CheckAdmin.php")?>
<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<META NAME="copyright"   />
<META NAME="Author"   />
<META NAME="Keywords" CONTENT="" />
<META NAME="Description" CONTENT="" />
<TITLE>编辑留言</TITLE>
<LINK href="Images/style.css" type=text/css rel=stylesheet>
<script language="javascript" src="Script/Admin.js"></script>
</HEAD>
<BODY>
<?php
@$ID=$_GET["ID"];
@$Result=$_GET["Result"];
MessageEdit($ID) ;
if(!isset($title)){$title="";}
if(!isset($content)){$content="";}
if(!isset($type1)){$type1="";}
if(!isset($type3)){$type3="";}
if(!isset($type2)){$type2="";}
if(!isset($type4)){$type4="";}
if(!isset($showflag)){$showflag="";}
if(!isset($add_time)){$add_time="";}
if(!isset($reply_time)){$reply_time="";}
?>

<br>
<table width="100%"  border="1" style="border:#6298E1 tthin solid;" cellpadding="3" cellspacing="1" class="input">
  <form name="editForm" method="post" action="MessageEdit.php?Action=SaveEdit&Result=<?php echo $Result ?>&ID=<?php echo $ID ?>"  onSubmit="return check_add();" >
    <tr>
      <td height="24" nowrap ><table width="100%" border="0" cellpadding="0" cellspacing="0"   idth="100%">
         
         
          <tr>
            <td width="12%" height="20" align="right">公司名称：</td>
            <td width="88%"><?php echo $title ?></td>
          </tr>
          <tr>
            <td height="20" align="right" valign="top">国家地区 ：<br>
            <td><?php echo $content ?></td>
          </tr>
          <tr>
            <td height="20" align="right">联系地址：</td>
            <td><?php echo $type1 ?></td>
          </tr>
           <tr>
            <td height="20" align="right">邮件地址：</td>
            <td><?php echo $type2 ?></td>
          </tr>
           <tr>
            <td height="20" align="right">联系电话：</td>
            <td><?php echo $type3 ?></td>
          </tr>
           <tr>
            <td height="20" align="right">咨询内容：</td>
            <td><?php echo $type4 ?></td>
          </tr>
          
          
          <tr>
            <td height="20" align="right">提交时间：</td>
            <td>
			  <?php
                if($add_time){  
                    echo  date('Y-m-d H:i:s',$add_time)  ;
                 }else{ 
                    echo  date('Y-m-d H:i:s')  ; 
                 }  
               ?>  
            </td>
          </tr>
      
         
          <tr>
            <td height="30" align="right">&nbsp;</td>
            <td valign="bottom"><input name="submitSaveEdit" type="button" class="button"  id="submitSaveEdit" value="返回" style="WIDTH: 80;" onClick="javascript:location.href='MessageList.php';" ></td>
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
function MessageEdit($ID){
   @$Action=$_GET["Action"];
   $Result=$_GET["Result"];
   if($Action=="SaveEdit"){  //添加修改数据
	 @$_POST["showflag"]==1?$showflag=1:$showflag=0;
     $type2=str_replace("'","",$_POST["type2"]) ;
     $reply_time=strtotime($_POST["reply_time"]) ;
	 $data_fields=" set `showflag`='$showflag' ,`type2`='$type2'  , `reply_time`=$reply_time " ; 
     if($Result=="Add"){
	    $sql="insert into `jp_message` ".$data_fields ;
		$GLOBALS["db"]->query($sql);
	 }elseif($Result=="Modify"){
	    $sql="update `jp_message` ".$data_fields."  where id=".$ID ;
	    $GLOBALS["db"]->query($sql);
	 }
	 echo "<script>alert('成功编辑留言信息！');location.href='MessageList.php';</script>";
  }else{   //提取信息
     if($Result=="Modify"){
	    $sql="select * from jp_message where id=". $ID ;
		@$result=$GLOBALS["db"]->query($sql);
	    @$yz=is_array($row=$GLOBALS["db"]->fetch_assoc($result));
		 if($yz){
		     global $title,$content,$type1,$type3,$type2,$type4,$showflag,$add_time,$reply_time;
			 $title=$row["title"] ;
			 $content=$row["content"] ;
			 
			 $type1=$row["type1"] ;
			 $showflag=$row["showflag"] ;
			 $add_time=$row["add_time"] ;
			 $reply_time=$row["reply_time"] ;
			 $type2=$row["type2"] ;
			 $type3=$row["type3"] ;
			 $type4=$row["type4"] ;
			 $GLOBALS["db"]->query("update jp_message set viewflag=1 where id=".$ID);
		}
	 }
  }
}
?>
