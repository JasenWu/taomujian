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
<script language="javascript" >
 function check_add(){
    if(document.editForm.NewsNameSi.value==""){alert("请填写新闻标题");document.editForm.NewsNameSi.focus();return false;}
	if(document.editForm.SortID.value=="2"){alert("请选择新闻类别");return false;}
	if(document.editForm.SortID.value=="3"){alert("请选择新闻类别");return false;}
	return true;
 }
</script>
<script type="text/javascript">

function BrowseServer( startupPath, functionData )
{
	// You can use the "CKFinder" class to render CKFinder in a page:
	var finder = new CKFinder();

	// The path for the installation of CKFinder (default = "/ckfinder/").
	finder.basePath = '../';

	//Startup path in a form: "Type:/path/to/directory/"
	finder.startupPath = startupPath;

	// Name of a function which is called when a file is selected in CKFinder.
	finder.selectActionFunction = SetFileField;

	// Additional data to be passed to the selectActionFunction in a second argument.
	// We'll use this feature to pass the Id of a field that will be updated.
	finder.selectActionData = functionData;

	// Name of a function which is called when a thumbnail is selected in CKFinder.
	finder.selectThumbnailActionFunction = ShowThumbnails;

	// Launch CKFinder
	finder.popup();
}

// This is a sample function which is called when a file is selected in CKFinder.
function SetFileField( fileUrl, data )
{
	document.getElementById( data["selectActionData"] ).value = fileUrl;
}

// This is a sample function which is called when a thumbnail is selected in CKFinder.
function ShowThumbnails( fileUrl, data )
{
	// this = CKFinderAPI
	var sFileName = this.getSelectedFile().name;
	document.getElementById( 'thumbnails' ).innerHTML +=
			'<div class="thumb">' +
				'<img src="' + fileUrl + '" />' +
				'<div class="caption">' +
					'<a href="' + data["fileUrl"] + '" target="_blank">' + sFileName + '</a> (' + data["fileSize"] + 'KB)' +
				'</div>' +
			'</div>';

	document.getElementById( 'preview' ).style.display = "";
	// It is not required to return any value.
	// When false is returned, CKFinder will not close automatically.
	return false;
}
	</script>
</HEAD>
<BODY>
<?php
@$ID=$_GET["ID"];
@$Result=$_GET["Result"];
NewsEdit($ID) ;
if(!isset($NewsNameSi)){$NewsNameSi="";}
if(!isset($Author)){$Author="";}
if(!isset($type1)){$type1="";}
if(!isset($SortIDs)){$SortIDs="";}
if(!isset($ViewFlagSi)){$ViewFlagSi="";}
if(!isset($ContentSi)){$ContentSi="";}
if(!isset($AddTime)){$AddTime="";}
?>

<br>
<table width="100%"  border="1" style="border:#6298E1 tthin solid;" cellpadding="3" cellspacing="1" class="input">
  <form name="editForm" method="post" action="NewsEdit.php?Action=SaveEdit&Result=<?php echo $Result ?>&ID=<?php echo $ID ?>"  onSubmit="return check_add();" >
    <tr>
      <td height="24" nowrap ><table width="100%" border="0" cellpadding="0" cellspacing="0"   idth="100%">
          <tr>
            <td width="120" height="20" align="right">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="20" align="right">新闻名称：</td>
            <td><input name="NewsNameSi" type="text" class="textfield" id="NewsNameSi" style="WIDTH: 240;" value="<?php echo $NewsNameSi ?>" maxlength="100"></td>
          </tr>
          <tr >
                <td height="20" align="right">关键字：</td>
                <td><input name="keyword" type="text" class="textfield" id="title" style="WIDTH: 240;" value="<?php echo @$keyword ?>" maxlength="100"></td>
          </tr>
          <tr >
            <td height="20" align="right" valign="top">描述：
            <td><textarea name="description" rows="8" class="textfield" id="description" style="WIDTH: 50%; height:50px;"   ><?php echo @$description ?></textarea></td>
           </tr>
          <tr style="display:none;">
            <td height="20" align="right">文章来源：：</td>
            <td><input name="Author" type="text" class="textfield" id="Author" style="WIDTH: 240;" value="<?php echo $Author ?>" maxlength="100"></td>
          </tr>
          <tr>
            <td height="20" align="right">所属类别：</td>
            <td><?php  show_select(1,$SortIDs) ;?>
            </td>
          </tr>
          <tr style="display:none;">
            <td height="20" align="right">新闻图片：</td>
            <td><input name="type1" type="text" class="textfield" id="type1" style="WIDTH: 240;" value="<?php echo $type1 ?>" maxlength="100"><input type="button" value="浏览图片" onClick="BrowseServer( 'Images:/', 'type1' );" /></td>
          </tr>
          <tr style="display:none;">
            <td height="20" align="right">首页推荐：</td>
            <td colspan="5"><input name="ViewFlagSi" type="checkbox" style='HEIGHT: 13px;WIDTH: 13px;' value="1" <?php if($ViewFlagSi){ echo "checked" ;} ?> ></td>
          </tr>
          <tr>
            <td height="20" align="right" valign="top">新闻介绍：<br>
            <td><textarea name="ContentSi" rows="8" class="textfield" id="ContentSi" style="WIDTH: 86%;height:250px;" ><?php echo $ContentSi ?></textarea></td>
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
     $NewsNameSi=escape_character($_POST["NewsNameSi"]) ;
	 @$_POST["ViewFlagSi"]==1?$ViewFlagSi=1:$ViewFlagSi=0;
     $SortID=$_POST["SortID"] ;
     $ContentSi=escape_character($_POST["ContentSi"]) ;
     $AddTime=strtotime($_POST["AddTime"]) ;
	 $Author=escape_character($_POST["Author"]) ;
	 $type1=escape_character($_POST["type1"]) ;
	 $keyword=escape_character($_POST["keyword"]) ;
	 $description=escape_character($_POST["description"]) ;
     if($SortID){   //下来列表选择类别的时候，需要查根据类别查找SortPath。
		 @$SortPath=$GLOBALS["db"]->getOne("select sortpath from jp_category where id=$SortID");
	 }
	 $data_fields=" set `news_content`='$ContentSi' ,`news_name`='$NewsNameSi'  , `add_time`=$AddTime , `viewflag`='$ViewFlagSi' , `sortid`='$SortID', `sortpath`='$SortPath', `author`='$Author', `type1`='$type1',`keyword`='$keyword', `description`='$description' " ; 
     if($Result=="Add"){
	    $sql="insert into `jp_news` ".$data_fields ;
		$GLOBALS["db"]->query($sql);
	 }elseif($Result=="Modify"){
	    $sql="update `jp_news` ".$data_fields."  where id=".$ID ;
	    $GLOBALS["db"]->query($sql);
	 }
	 echo "<script>alert('成功编辑新闻信息！');location.href='NewsList.php';</script>";
  }else{   //提取信息
     if($Result=="Modify"){
	    $sql="select * from jp_news where id=". $ID ;
		@$result=$GLOBALS["db"]->query($sql);
	    @$yz=is_array($row=$GLOBALS["db"]->fetch_assoc($result));
		 if($yz){
		     global $NewsNameSi,$SortIDs,$SortPath,$ViewFlagSi,$ContentSi,$AddTime,$Author,$type1,$keyword,$description;
			 $NewsNameSi=$row["news_name"] ;
			 $SortIDs=$row["sortid"] ;
			 $SortPath=$row["sortpath"] ;
			 $ViewFlagSi=$row["viewflag"] ;
			 $ContentSi=$row["news_content"] ;
			 $AddTime=$row["add_time"] ;
			 $Author=$row["author"] ;
			 $type1=$row["type1"] ;
			 $keyword=$row["keyword"] ;
			 $description=$row["description"] ;
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
