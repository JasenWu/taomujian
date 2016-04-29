<?php include("CheckAdmin.php")?>
<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<META NAME="copyright"   />
<META NAME="Author"   />
<META NAME="Keywords" CONTENT="" />
<META NAME="Description" CONTENT="" />
<TITLE>编辑伙伴</TITLE>
<LINK href="Images/style.css" type=text/css rel=stylesheet>
<script language="javascript" src="Script/Admin.js"></script>
<script type="text/javascript" src="../ckfinder/ckfinder.js"></script>
<script language="javascript" >
 function check_add(){
    if(document.editForm.link_name.value==""){alert("请填写伙伴名称");document.editForm.link_name.focus();return false;}
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
if(!isset($px)){$px=999;}
if(!isset($link_name)){$link_name="";}
if(!isset($link_url)){$link_url="";}
if(!isset($AddTime)){$AddTime="";}
if(!isset($type1)){$type1="";}
if(!isset($type2)){$type2="";}
if(!isset($SortIDs)){$SortIDs="";}
?>

<br>
<table width="100%"  border="1" style="border:#6298E1 tthin solid;" cellpadding="3" cellspacing="1" class="input">
  <form name="editForm" method="post" action="LinksEdit1.php?Action=SaveEdit&Result=<?php echo $Result ?>&ID=<?php echo $ID ?>"  onSubmit="return check_add();" >
    <tr>
      <td height="24" nowrap ><table width="100%" border="0" cellpadding="0" cellspacing="0"   idth="100%">
          <tr>
            <td width="120" height="20" align="right">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="20" align="right">排序：</td>
            <td><input name="px" type="text" class="textfield" id="px" style="WIDTH: 240;" value="<?php echo $px ?>" maxlength="100"></td>
          </tr>
          <tr>
            <td height="20" align="right">伙伴名称(中)：</td>
            <td><input name="link_name" type="text" class="textfield" id="link_name" style="WIDTH: 240;" value="<?php echo $link_name ?>" maxlength="100"></td>
          </tr>
          <tr>
            <td height="20" align="right"><strong>伙伴名称(英)</strong>：</td>
            <td><input name="type2" type="text" class="textfield" id="type2" style="WIDTH: 240;" value="<?php echo $type2 ?>" maxlength="100"></td>
          </tr>
          <tr>
            <td height="20" align="right">伙伴图片：</td>
            <td><input name="type1" type="text" class="textfield" id="type1" style="WIDTH: 240;" value="<?php echo $type1 ?>" maxlength="100"><input type="button" value="浏览图片" onClick="BrowseServer( 'Images:/', 'type1' );" /></td>
          </tr>
          <tr style="display:none;">
            <td height="20" align="right">所属类别：</td>
            <td><?php  show_select(12,$SortIDs) ;?>
            </td>
          </tr>
          <tr>
            <td height="20" align="right">伙伴地址：</td>
            <td><input name="link_url" type="text" class="textfield" id="link_url" style="WIDTH: 240;" value="<?php echo $link_url ?>" maxlength="100"></td>
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
     $link_name=$_POST["link_name"] ;
     $link_url=$_POST["link_url"] ;
     $AddTime=strtotime($_POST["AddTime"]) ;
	 $type1=$_POST["type1"] ;
	 $type2=$_POST["type2"] ;
	 $px=$_POST["px"] ;
	 $SortID=$_POST["SortID"] ;
	 if($SortID){   //下来列表选择类别的时候，需要查根据类别查找SortPath。
		 @$SortPath=$GLOBALS["db"]->getOne("select sortpath from jp_category where id=$SortID");
	 }
	 $data_fields=" set `link_name`='$link_name' , `sortid`='$SortID', `sortpath`='$SortPath',`link_url`='$link_url'  , `add_time`=$AddTime , `px`='$px',`type1`='$type1',`type2`='$type2' " ; 
     if($Result=="Add"){
	    $sql="insert into `jp_link` ".$data_fields ;
		$GLOBALS["db"]->query($sql);
	 }elseif($Result=="Modify"){
	    $sql="update `jp_link` ".$data_fields."  where id=".$ID ;
	    $GLOBALS["db"]->query($sql);
	 }
	 echo "<script>alert('成功编辑伙伴信息！');location.href='LinksList1.php';</script>";
  }else{   //提取信息
     if($Result=="Modify"){
	    $sql="select * from jp_link where id=". $ID ;
		@$result=$GLOBALS["db"]->query($sql);
	    @$yz=is_array($row=$GLOBALS["db"]->fetch_assoc($result));
		 if($yz){
		     global $link_name,$link_url,$px,$AddTime,$type1,$type2,$SortIDs,$SortPath;
			 $link_name=$row["link_name"] ;
			 $SortIDs=$row["sortid"] ;
			 $SortPath=$row["sortpath"] ;
			 $link_url=$row["link_url"] ;
			 $AddTime=$row["add_time"] ;
			 $px=$row["px"] ;
			 $type1=$row["type1"] ;
			 $type2=$row["type2"] ;
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
