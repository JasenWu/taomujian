<?php include("CheckAdmin.php")?>
<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<META NAME="copyright"   />
<META NAME="Author"   />
<META NAME="Keywords" CONTENT="" />
<META NAME="Description" CONTENT="" />
<TITLE>编辑职位</TITLE>
<LINK href="Images/style.css" type=text/css rel=stylesheet>
<script language="javascript" src="Script/Admin.js"></script>
<script charset="utf-8" src="../kind_editor/kindeditor.js"></script>
<script language="javascript">
	KE.show({
		id : 'job_content',
		imageUploadJson : '../../lxw_editor/upload_json.php',
		fileManagerJson : '../../lxw_editor/file_manager_json.php',
		allowFileManager : true
	});
	KE.show({
		id : 'type3',
		imageUploadJson : '../../lxw_editor/upload_json.php',
		fileManagerJson : '../../lxw_editor/file_manager_json.php',
		allowFileManager : true
	});
</script>
<script language="javascript" >
 function check_add(){
    if(document.editForm.job_name.value==""){alert("请填写职位名称");document.editForm.job_name.focus();return false;}
	if(document.editForm.SortID.value==""){alert("请选择职位类别");return false;}
	return true;
 }
</script>
</HEAD>
<BODY>
<?php
@$ID=$_GET["ID"];
@$Result=$_GET["Result"];
NewsEdit($ID) ;
if(!isset($job_name)){$job_name="";}
if(!isset($type1)){$type1="";}
if(!isset($type2)){$type2="";}
if(!isset($type3)){$type3="";}
if(!isset($SortIDs)){$SortIDs=0;}
if(!isset($job_num)){$job_num="";}
if(!isset($job_address)){$job_address="";}
if(!isset($add_time)){$add_time="";}
if(!isset($job_content)){$job_content="";}
?>

<br>
<table width="100%"  border="1" style="border:#6298E1 tthin solid;" cellpadding="3" cellspacing="1" class="input">
  <form name="editForm" method="post" action="JobsEdit.php?Action=SaveEdit&Result=<?php echo $Result ?>&ID=<?php echo $ID ?>"  onSubmit="return check_add();" >
    <tr>
      <td height="24" nowrap ><table width="100%" border="0" cellpadding="0" cellspacing="0"   idth="100%">
          <tr>
            <td width="120" height="20" align="right">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="20" align="right">职位名称：</td>
            <td><input name="job_name" type="text" class="textfield" id="job_name" style="WIDTH: 240;" value="<?php echo $job_name ?>" maxlength="100"></td>
          </tr>
          <tr>
            <td height="20" align="right">招聘人数：</td>
            <td><input name="job_num" type="text" class="textfield" id="job_num" style="WIDTH: 240;" value="<?php echo $job_num ?>" maxlength="100"></td>
          </tr>
          <tr>
            <td height="20" align="right">工作地点：</td>
            <td><input name="job_address" type="text" class="textfield" id="job_address" style="WIDTH: 240;" value="<?php echo $job_address ?>" maxlength="100"></td>
          </tr>
          <tr>
            <td height="20" align="right">学历要求：</td>
            <td><input name="type1" type="text" class="textfield" id="type1" style="WIDTH: 240;" value="<?php echo $type1 ?>" maxlength="100"></td>
          </tr>
          <tr>
            <td height="20" align="right">工资待遇：</td>
            <td><input name="type2" type="text" class="textfield" id="type2" style="WIDTH: 240;" value="<?php echo $type2 ?>" maxlength="100"></td>
          </tr>
          <tr>
            <td height="20" align="right">职位类型：</td>
            <td><input type="radio" name="SortID" value="0" <?php echo $SortIDs==0?"checked":""; ?>> 中文 &nbsp;&nbsp;&nbsp;&nbsp;   <input type="radio" name="SortID" value="1" <?php echo $SortIDs==1?"checked":""; ?>> 英文 
            </td>
          </tr>
          <tr>
            <td height="20" align="right" valign="top">岗位职责：<br>
            <td><textarea name="job_content" rows="8" class="textfield" id="job_content" style="WIDTH: 86%;height:250px;" ><?php echo $job_content ?></textarea></td>
          </tr>
          <tr>
            <td height="20" align="right" valign="top">岗位要求：<br>
            <td><textarea name="type3" rows="8" class="textfield" id="type3" style="WIDTH: 86%;height:250px;" ><?php echo $type3 ?></textarea></td>
          </tr>
          <tr>
            <td height="20" align="right">发布日期：</td>
            <td><input name="add_time" type="text" class="textfield" id="add_time" style="WIDTH: 240;"  
		  <?php
		    if($add_time){  
		        echo "value='". date('Y-m-d H:i:s',$add_time) ."'" ;
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
function NewsEdit($ID){
   @$Action=$_GET["Action"];
   $Result=$_GET["Result"];
   if($Action=="SaveEdit"){  //添加修改数据
     $job_name=$_POST["job_name"] ;
     $SortID=$_POST["SortID"] ;
     $job_content=str_replace("'","",$_POST["job_content"]) ;
     $add_time=strtotime($_POST["add_time"]) ;
	 $type1=$_POST["type1"] ;
	 $type2=$_POST["type2"] ;
	 $type3=$_POST["type3"] ;
	 $job_num=$_POST["job_num"] ;
	 $job_address=$_POST["job_address"] ;
	 $data_fields=" set `job_name`='$job_name' ,`type1`='$type1'  , `type2`='$type2' , `type3`='$type3' , `sortid`='$SortID', `job_num`='$job_num', `job_address`='$job_address', `add_time`='$add_time', `job_content`='$job_content' " ; 
     if($Result=="Add"){
	    $sql="insert into `jp_job` ".$data_fields ;
		$GLOBALS["db"]->query($sql);
	 }elseif($Result=="Modify"){
	    $sql="update `jp_job` ".$data_fields."  where id=".$ID ;
	    $GLOBALS["db"]->query($sql);
	 }
	 echo "<script>alert('成功编辑职位信息！');location.href='JobsList.php';</script>";
  }else{   //提取信息
     if($Result=="Modify"){
	    $sql="select * from jp_job where id=". $ID ;
		@$result=$GLOBALS["db"]->query($sql);
	    @$yz=is_array($row=$GLOBALS["db"]->fetch_assoc($result));
		 if($yz){
		     global $job_name,$SortIDs,$type1,$type2,$type3,$job_num,$job_address,$add_time,$job_content;
			 $job_name=$row["job_name"] ;
			 $SortIDs=$row["sortid"] ;
			 $type1=$row["type1"] ;
			 $type2=$row["type2"] ;
			 $type3=$row["type3"] ;
			 $job_num=$row["job_num"] ;
			 $job_address=$row["job_address"] ;
			 $add_time=$row["add_time"] ;
			 $job_content=$row["job_content"] ;
		}
	 }
  }
}
Function SortText($ID){ //获得类别的名称
  if($ID){
	  $sql="Select * From jp_category where id=".$ID;
	  $row=$GLOBALS["db"]->query($sql);
	  $yes=is_array($result=$GLOBALS["db"]->fetch_assoc($row));
	  if($yes){
		 return  $result["sortname"];
    }
  }
}
?>
