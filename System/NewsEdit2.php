<?php include("CheckAdmin.php")?>
<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<META NAME="copyright"   />
<META NAME="Author"   />
<META NAME="Keywords" CONTENT="" />
<META NAME="Description" CONTENT="" />
<TITLE>编辑类别</TITLE>
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
	KE.show({
		id : 'type2',
		imageUploadJson : '../../lxw_editor/upload_json.php',
		fileManagerJson : '../../lxw_editor/file_manager_json.php',
		allowFileManager : true
	});
</script>
<script language="javascript" >
 function check_add(){
    if(document.editForm.NewsNameSi.value==""){alert("请填写类别标题");document.editForm.NewsNameSi.focus();return false;}
	if(document.editForm.SortID.value==""){alert("请选择类别类别");return false;}
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
//if(!isset($Author)){$Author="";}
if(!isset($SortIDs)){$SortIDs="";}
if(!isset($views)){$views=99;}
if(!isset($ContentSi)){$ContentSi="";}
if(!isset($AddTime)){$AddTime="";}
if(!isset($type1)){$type1="";}
if(!isset($type2)){$type2="";} 
if(!isset($author)){$author="";}
if(!isset($keyword)){$keyword="";}
if(!isset($description)){$description="";}
?>

<br>
<table width="100%"  border="1" style="border:#6298E1 tthin solid;" cellpadding="3" cellspacing="1" class="input">
  <form name="editForm" method="post" action="NewsEdit2.php?Action=SaveEdit&Result=<?php echo $Result ?>&ID=<?php echo $ID ?>"  onSubmit="return check_add();" >
    <tr>
      <td height="24" nowrap ><table width="100%" border="0" cellpadding="0" cellspacing="0"   idth="100%">
          <tr>
            <td width="120" height="20" align="right">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="20" align="right">类别排序：</td>
            <td><input name="views" type="text" class="textfield" id="views" style="WIDTH: 240;" value="<?php echo $views ?>" maxlength="100"></td>
          </tr>
          <tr>
            <td height="20" align="right">类别名称(中)：</td>
            <td><input name="NewsNameSi" type="text" class="textfield" id="NewsNameSi" style="WIDTH: 240;" value="<?php echo $NewsNameSi ?>" maxlength="100"></td>
          </tr>
          <tr>
            <td height="20" align="right"><strong>类别名称(英)</strong>：</td>
            <td><input name="type1" type="text" class="textfield" id="type1" style="WIDTH: 240;" value="<?php echo $type1 ?>" maxlength="100"></td>
          </tr>
          <tr>
            <td height="20" align="right">链接地址(中)：</td>
            <td><input name="keyword" type="text" class="textfield" id="keyword" style="WIDTH: 240;" value="<?php echo $keyword ?>" maxlength="100"></td>
          </tr>
          <tr>
            <td height="20" align="right"><strong>链接地址(英)</strong>：</td>
            <td><input name="description" type="text" class="textfield" id="description" style="WIDTH: 240;" value="<?php echo $description ?>" maxlength="100"></td>
          </tr>
          <tr>
            <td height="20" align="right">类别图片：</td>
            <td><input name="type3" type="text" class="textfield" id="type3" style="WIDTH: 240;" value="<?php echo $author ?>" maxlength="100"><input type="button" value="浏览图片" onClick="BrowseServer( 'Images:/', 'type3' );" /></td>
          </tr>
          <tr>
            <td height="20" align="right">所属类别：</td>
            <td><?php  show_select(40,$SortIDs) ;?>
            </td>
          </tr>
          <tr>
            <td height="20" align="right" valign="top">类别介绍(中)：<br>
            <td><textarea name="ContentSi" rows="8" class="textfield" id="ContentSi" style="WIDTH: 86%;height:250px;" ><?php echo $ContentSi ?></textarea></td>
          </tr>
          <tr>
            <td height="20" align="right" valign="top"><strong>类别介绍(英)</strong>：<br>
            <td><textarea name="type2" rows="8" class="textfield" id="type2" style="WIDTH: 86%;height:250px;" ><?php echo $type2 ?></textarea></td>
          </tr>
          <tr>
            <td height="20" align="right">添加日期：</td>
            <td><input name="AddTime" type="text" class="textfield" id="AddTime" style="WIDTH: 240;"  
		  <?php
		    if($AddTime){  
		        echo "value='". date('Y-m-d',$AddTime) ."'" ;
			 }else{ 
			    echo "value='". date('Y-m-d') ."'" ; 
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
     $SortID=$_POST["SortID"] ;
     $ContentSi=str_replace("'","",$_POST["ContentSi"]) ;
     $AddTime=strtotime($_POST["AddTime"]) ;
	 $views=$_POST["views"] ;
	 $author=$_POST["type3"];
	 $type1=$_POST["type1"];
	 $type2=$_POST["type2"];
	 $keyword=$_POST["keyword"];
	 $description=$_POST["description"];
     if($SortID){   //下来列表选择类别的时候，需要查根据类别查找SortPath。
		 @$SortPath=$GLOBALS["db"]->getOne("select sortpath from jp_category where id=$SortID");
	 }
	 $data_fields=" set `news_content`='$ContentSi' ,`news_name`='$NewsNameSi'  , `add_time`=$AddTime  , `sortid`='$SortID', `sortpath`='$SortPath',`views`='$views',`author`='$author',`type1`='$type1',`type2`='$type2',`keyword`='$keyword',`description`='$description' " ; 
     if($Result=="Add"){
	    $sql="insert into `jp_news` ".$data_fields ;
		$GLOBALS["db"]->query($sql);
	 }elseif($Result=="Modify"){
	    $sql="update `jp_news` ".$data_fields."  where id=".$ID ;
	    $GLOBALS["db"]->query($sql);
	 }
	 echo "<script>alert('成功编辑类别信息！');location.href='NewsList2.php';</script>";
  }else{   //提取信息
     if($Result=="Modify"){
	    $sql="select * from jp_news where id=". $ID ;
		@$result=$GLOBALS["db"]->query($sql);
	    @$yz=is_array($row=$GLOBALS["db"]->fetch_assoc($result));
		 if($yz){
		     global $NewsNameSi,$SortIDs,$SortPath,$ViewFlagSi,$ContentSi,$AddTime,$author,$views,$type1,$type2,$keyword,$description;
			 $NewsNameSi=$row["news_name"] ;
			 $SortIDs=$row["sortid"] ;
			 $SortPath=$row["sortpath"] ;
			 $ContentSi=$row["news_content"] ;
			 $AddTime=$row["add_time"] ;
			 $views=$row["views"] ;
			 $author=$row["author"] ;
			 $type1=$row["type1"] ;
			 $type2=$row["type2"] ;
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
