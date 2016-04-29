<?php include("CheckAdmin.php")?>
<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<META NAME="copyright"   />
<META NAME="Author"   />
<META NAME="Keywords" CONTENT="" />
<META NAME="Description" CONTENT="" />
<TITLE>服务领域图片</TITLE>
<LINK href="Images/style.css" type=text/css rel=stylesheet>
<script language="javascript" src="Script/Admin.js"></script>
<script charset="utf-8" src="../kind_editor/kindeditor.js"></script>
<script type="text/javascript" src="../ckfinder/ckfinder.js"></script>
<script>
	KE.show({
		id : 'ContentSi',
		imageUploadJson : '../../lxw_editor/upload_json.php',
		fileManagerJson : '../../lxw_editor/file_manager_json.php',
		allowFileManager : true
	});
</script>
<script type="text/javascript">
	function BrowseServer( startupPath, functionData ){
		var finder = new CKFinder();
		finder.basePath = '../';
		finder.startupPath = startupPath;
		finder.selectActionFunction = SetFileField;
		finder.selectActionData = functionData;
		finder.selectThumbnailActionFunction = ShowThumbnails;
		finder.popup();
	}
	function SetFileField( fileUrl, data ){
		document.getElementById( data["selectActionData"] ).value = fileUrl;
	}
	function ShowThumbnails( fileUrl, data ){
		var sFileName = this.getSelectedFile().name;
		document.getElementById( 'thumbnails' ).innerHTML +=
				'<div class="thumb">' +
					'<img src="' + fileUrl + '" />' +
					'<div class="caption">' +
						'<a href="' + data["fileUrl"] + '" target="_blank">' + sFileName + '</a> (' + data["fileSize"] + 'KB)' +
					'</div>' +
				'</div>';
	
		document.getElementById( 'preview' ).style.display = "";
		return false;
	}
	
	function check_add()
	{
		if(document.editForm.type1.value==""){
		  alert("请上传图片");
		  return false;	
		}
	}
</script>
</HEAD>
<BODY>
<?php
@$ID=$_GET["ID"];
@$Result=$_GET["Result"];
NewsEdit($ID) ;
if(!isset($px)){
  $px=$db->getOne("select max(views) as orders from jp_news where sortpath like '%0,1,%' ");
  $px++;	
}
if(!isset($NewsNameSi)){$NewsNameSi="";}
if(!isset($author)){$author="";}
if(!isset($type1)){$type1="";}
if(!isset($type2)){$type2="t0,1";}
if(!isset($SortIDs)){$SortIDs="";}
if(!isset($ViewFlagSi)){$ViewFlagSi="";}
if(!isset($news_content)){$news_content="";}
if(!isset($AddTime)){$AddTime="";}
if(!isset($keyword)){$keyword="";}
?>

<br>
<table width="100%"  border="1" style="border:#6298E1 tthin solid;" cellpadding="3" cellspacing="1" class="input">
  <form name="editForm" method="post" action="PicEdit4.php?Action=SaveEdit&Result=<?php echo $Result ?>&ID=<?php echo $ID ?>"  onSubmit="return check_add();" >
    <tr>
      <td height="24" nowrap ><table width="100%" border="0" cellpadding="0" cellspacing="0"   idth="100%">
          <tr>
            <td width="120" height="20" align="right">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="20" align="right">排序：</td>
            <td><input name="px" type="text" class="textfield" id="px" style="WIDTH: 240;" value="<?php echo $px ?>" maxlength="100">(按升序排序，数字小的排前面)</td>
          </tr>
          <tr>
            <td height="20" align="right">服务领域名称(中)：</td>
            <td><input name="NewsNameSi" type="text" class="textfield" id="NewsNameSi" style="WIDTH: 240;" value="<?php echo $NewsNameSi ?>" maxlength="100"></td>
          </tr>
          <tr>
            <td height="20" align="right">服务领域名称(英)：</td>
            <td><input name="news_content" type="text" class="textfield" id="news_content" style="WIDTH: 240;" value="<?php echo $news_content ?>" maxlength="100"></td>
          </tr>
          <tr>
            <td height="20" align="right">服务内容(中): </td>
            <td><input name="author" type="text" class="textfield" id="news_content" style="WIDTH: 240;" value="<?php echo $author ?>" maxlength="100"></td>
          </tr>
          
           <tr>
            <td height="20" align="right">服务内容(英): </td>
            <td><input name="keyword" type="text" class="textfield" id="keyword" style="WIDTH: 240;" value="<?php echo $keyword ?>" maxlength="100"></td>
          </tr>
          
          <tr>
            <td height="20" align="right">所属类别：</td>
            <td><?php  show_select(54,$SortIDs) ;?>
            </td>
          </tr>
          <tr>
            <td height="20" align="right">服务领域图片：</td>
            <td><input name="type1" type="text" class="textfield" id="type1" style="WIDTH: 240;" value="<?php echo $type1 ?>" maxlength="100"><input type="button" value="浏览图片" onClick="BrowseServer( 'Images:/', 'type1' );" /></td>
          </tr>
          <tr>
            <td height="20" align="right">服务领域类型：</td>
            <td colspan="5">
               <input type="checkbox" value="0" name="type2[]"  <?php echo strpos($type2,"0")>0?"checked":"" ;?>>中文 &nbsp;&nbsp; <input type="checkbox" value="1" name="type2[]" <?php echo strpos($type2,"1")>0?"checked":"" ;?>>英文
            </td>
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
function NewsEdit($ID){
   @$Action=$_GET["Action"];
   $Result=$_GET["Result"];
   if($Action=="SaveEdit"){  //添加修改数据
     $NewsNameSi=$_POST["NewsNameSi"] ;
	 $news_content=$_POST["news_content"] ;
     $SortID=$_POST["SortID"] ;
     $AddTime=strtotime($_POST["AddTime"]) ;
	 $author=@$_POST["author"] ; 
	 $keyword=@$_POST["keyword"];
	 $type1=@$_POST["type1"] ;
	 $type2=@$_POST["type2"] ;
	 $views=@$_POST["px"] ;
	 if($type2){
		foreach($type2 as $types){
		   	$type2.=$types.",";
		 }
	  } 
	 if($SortID){   //下来列表选择类别的时候，需要查根据类别查找SortPath。
		 @$SortPath=$GLOBALS["db"]->getOne("select sortpath from jp_category where id=$SortID");
	 }
	 $data_fields=" set `news_name`='$NewsNameSi',`news_content`='$news_content'  , `add_time`=$AddTime ,`sortid`='$SortID', `sortpath`='$SortPath', `type2`='$type2', `type1`='$type1', `author`='$author', `views`='$views',`keyword`='$keyword' " ; 
     if($Result=="Add"){
	    $sql="insert into `jp_news` ".$data_fields ;
		$GLOBALS["db"]->query($sql);
	 }elseif($Result=="Modify"){
	    $sql="update `jp_news` ".$data_fields."  where id=".$ID ;
	    $GLOBALS["db"]->query($sql);
	 }
	 echo "<script>alert('成功编辑服务领域信息！');location.href='PicList4.php';</script>";
  }else{   //提取信息
     if($Result=="Modify"){
	    $sql="select * from jp_news where id=". $ID ;
		@$result=$GLOBALS["db"]->query($sql);
	    @$yz=is_array($row=$GLOBALS["db"]->fetch_assoc($result));
		 if($yz){
		     global $NewsNameSi,$news_content,$SortIDs,$SortPath,$ViewFlagSi,$ContentSi,$AddTime,$type2,$type1,$author,$px,$keyword;
			 $NewsNameSi=$row["news_name"] ;
			 $SortIDs=$row["sortid"] ;
			 $SortPath=$row["sortpath"] ;
			 $news_content=$row["news_content"] ;
			 $AddTime=$row["add_time"] ;
			 $type2=$row["type2"] ;
			 $type1=$row["type1"] ;
			 $author=$row["author"] ;
			 $px=$row["views"] ;
			 $keyword=$row["keyword"] ;
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
