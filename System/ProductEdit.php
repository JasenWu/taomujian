<?php include("CheckAdmin.php")?>
<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<META NAME="copyright"   />
<META NAME="Author"   />
<META NAME="Keywords" CONTENT="" />
<META NAME="Description" CONTENT="" />
<TITLE>编辑产品</TITLE>
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
		id : 'ContentEn',
		imageUploadJson : '../../lxw_editor/upload_json.php',
		fileManagerJson : '../../lxw_editor/file_manager_json.php',
		allowFileManager : true
	});
</script>
<script language="javascript" >
 function check_add(){
    if(document.editForm.NewsNameSi.value==""){alert("请填写产品标题");document.editForm.NewsNameSi.focus();return false;}
	if(document.editForm.SortID.value==""){alert("请选择产品类别");return false;}
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
 <style type="text/css" >   
h1,h2,h3,h4,h5,h6,ul,li,p{padding:0; margin:0;}
ul { list-style:none; margin:0;padding:0;}
#product ul li {float:left; margin:5px;}

.nTab{

width: 820px;
margin-top:20px;
background-position:left;
margin-bottom:2px;
}
.nTab .TabTitle{
clear: both;
height: 27px;
overflow: hidden;
}
.nTab .TabTitle ul{
border:0;
margin:0;
padding:0;
}
.nTab .TabTitle li{
float: left;
width: 90px;
cursor: pointer;
padding-top: 4px;
padding-right: 1px;
padding-left: 0px;
padding-bottom: 2px;
list-style-type: none;
border-bottom:2px solid #0b5b02
}
.nTab .TabTitle .active{ background-color:#00F; text-align:center; color:#fff;}
.nTab .TabTitle .normal{ text-align:center; color:#094a7c;}
.nTab .TabContent{
width:820px;
margin: 0px auto;
padding:10px;
line-height:20px;
}
.none {display:none;}
 

</style> 
<script src="Script/jquery.min.js" type="text/javascript"></script>     
</HEAD>
<BODY>
<?php
@$ID=$_GET["ID"];
@$Result=$_GET["Result"];
NewsEdit($ID) ;
if(!isset($px)){
  $px=$db->getOne("select max(px) as orders from jp_product where sortpath like '%0,2,%' ");
  $px++;	
}
if(!isset($NewsNameSi)){$NewsNameSi="";}
if(!isset($NewsNameEn)){$NewsNameEn="";}
if(!isset($type1)){$type1="";}
if(!isset($SortIDs)){$SortIDs="";}
if(!isset($ContentSi)){$ContentSi="";}
if(!isset($ContentEn)){$ContentEn="";}
if(!isset($ViewFlagSi)){$ViewFlagSi="";}
if(!isset($AddTime)){$AddTime="";}
?>
 <form name="editForm" method="post" action="ProductEdit.php?Action=SaveEdit&Result=<?php echo $Result ?>&ID=<?php echo $ID ?>"  onSubmit="return check_add();" >
 <input type="hidden" value="<?php echo isset($ID)?$ID:0 ?>" name="product_id" id="product_id" >
<table width="100%"  border="1" style="border:#6298E1 tthin solid;" cellpadding="3" cellspacing="1" class="input">
 
    <tr>
      <td height="24" nowrap >
         
                
      
      <table width="100%" border="0" cellpadding="0" cellspacing="0"   idth="100%">
          <tr>
            <td height="20" align="right" width="120">排序：</td>
            <td><input name="px" type="text" class="textfield" id="px" style="WIDTH: 240;" value="<?php echo $px ?>" maxlength="100">(升序排序，数字小的排前面)</td>
          </tr>
          
          <tr>
            <td height="20" align="right">产品名称：</td>
            <td><input name="NewsNameSi" type="text" class="textfield" id="NewsNameSi" style="WIDTH: 240;" value="<?php echo $NewsNameSi ?>" maxlength="100"></td>
          </tr>
         <tr >
                        <td height="20" align="right" width="120">关键字：</td>
                        <td><input name="keyword" type="text" class="textfield" id="title" style="WIDTH: 240;" value="<?php echo @$keyword ?>" maxlength="100"></td>
                  </tr>
                  <tr >
                    <td height="20" align="right" valign="top">描述：</td>
                    <td><textarea name="description" rows="8" class="textfield" id="description" style="WIDTH: 50%; height:50px;"   ><?php echo @$description ?></textarea></td>
                   </tr>
          <tr>
            <td height="20" align="right">产品图片：</td>
            <td><input name="type1" type="text" class="textfield" id="type1" style="WIDTH: 240;" value="<?php echo $type1 ?>" maxlength="100"><input type="button" value="浏览图片" onClick="BrowseServer( 'Images:/', 'type1' );" />(160px*160px)</td>
          </tr>
          <tr>
          </tr>
          <tr class="sort" >
            <td height="20" align="right"> 所属类别：</td>
            <td><?php  show_selects(2,@$SortIDs[0]) ;?>
               
            </td>
          </tr>
          
          <tr>
            <td height="20" align="right" valign="top">产品介绍：<br>
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
        </table>
        
          
                 
                   
        <table width="100%" border="0" cellpadding="0" cellspacing="0"   idth="100%">
               <tr>
                  <td height="30" align="right" width="150">&nbsp;</td>
                  <td valign="bottom"><input name="submitSaveEdit" type="submit" class="button"  id="submitSaveEdit" value="保存" style="WIDTH: 80;" ></td>
                </tr>
                <tr>
                  <td height="20" align="right">&nbsp;</td>
                  <td valign="bottom">&nbsp;</td>
                </tr>
             </table>   
      </td>
    </tr>
 
</table>
 </form>
<br><Br>
</BODY>
</HTML>
<?php
function NewsEdit($ID){
   @$Action=$_GET["Action"];
   $Result=$_GET["Result"];
   if($Action=="SaveEdit"){  //添加修改数据
     $px=$_POST["px"] ;
     $NewsNameSi=escape_character($_POST["NewsNameSi"]) ;
     $SortID=$_POST["SortID"] ;
     $ContentSi=escape_character($_POST["ContentSi"]) ;
     $AddTime=strtotime($_POST["AddTime"]) ;
	 $type1=$_POST["type1"] ;
	 
	 $keyword=escape_character($_POST["keyword"]) ;
	 $description=escape_character($_POST["description"]) ;
	 $SortPath="";
	 
	 if(!empty($SortID)){
		 $SortID=implode(",",$SortID);
		 $sql="select sortpath from jp_category where id in($SortID)";
		 $result=$GLOBALS["db"]->getAll($sql);
		 if(!empty($result)){
		   foreach($result as $v){
			  $SortPath.= $v["sortpath"];
			}	 
		}
	 }else{
		 echo "<script>alert('情选择产品类别！');history.back();</script>";
	 }
	 
	 @$_POST["ViewFlagSi"]==1?$ViewFlagSi=1:$ViewFlagSi=0;
	 $data_fields=" set `px`='$px',  `product_content`='$ContentSi' ,`product_name`='$NewsNameSi'  , `add_time`=$AddTime  , `sortid`='$SortID', `sortpath`='$SortPath', `type1`='$type1', `viewflag`='$ViewFlagSi', `keyword`='$keyword', `description`='$description' " ; 
	// echo  $data_fields;
	 //查找次序号是否存在，存在则+1
	 $sql="select id from `jp_product` where px='".$px."' and id <>'".$ID."'  ";
	 $info=$GLOBALS["db"]->getAll("$sql");
	 if(isset($info[0])){ //如果有则，更新
		 $GLOBALS["db"]->query("update `jp_product` set px=px+1 where px>=".$px."  ");
	 }
	 
	
     if($Result=="Add"){
	    $sql="insert into `jp_product` ".$data_fields ;
		$GLOBALS["db"]->query($sql);
		$ID=mysql_insert_id(); 
	 }elseif($Result=="Modify"){
		 
		 
	    $sql="update `jp_product` ".$data_fields."  where id=".$ID ;
	    $GLOBALS["db"]->query($sql);
	 }

	 echo "<script>alert('成功编辑产品信息！');location.href='ProductList.php';</script>";
  }else{   //提取信息
     if($Result=="Modify"){
	    $sql="select * from jp_product where id=". $ID ;
		@$result=$GLOBALS["db"]->query($sql);
	    @$yz=is_array($row=$GLOBALS["db"]->fetch_assoc($result));
		 if($yz){
		     global $px,$NewsNameSi,$NewsNameEn,$SortIDs,$SortPath,$ViewFlagSi,$ContentSi,$ContentEn,$AddTime,$Author,$type1,$keyword,$description,$keyword_en,$description_en,$video,$video1,$img_list,$type4;
			 $px=$row["px"] ;
			 $NewsNameSi=$row["product_name"] ;
			 $NewsNameEn=$row["type2"] ;
			 $SortIDs=explode(",",$row["sortid"]) ;
			 $SortPath=$row["sortpath"] ;
			 $ContentSi=$row["product_content"] ;
			 $ContentEn=$row["type3"] ;
			 $AddTime=$row["add_time"] ;
			 $type1=$row["type1"] ;
			 $ViewFlagSi=$row["viewflag"] ;
			 $keyword=$row["keyword"] ;
			 $description=$row["description"] ;
			 $keyword_en=$row["keyword_en"] ;
			 $description_en=$row["description_en"] ;
			 $video=$row["video"] ;
			 $video1=$row["video1"] ;
			// $img_list=$GLOBALS["db"]->getAll("select px,photo_img,id from jp_photo where sortid=".$ID." order by px asc  ");
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

function show_selects($types,$SortIDs){ //下来显示信息的类别
  $sql="select sortname,id from jp_category where parentid=$types order by px asc ,id asc  " ;
  $result=$GLOBALS["db"]->getAll($sql);
  echo "<select name='SortID[]'>";
  foreach($result as $v){
	  extract($v);
	  if($SortIDs==$id){$select="selected" ;}else{$select="";}
	  echo "<option value='$id' $select >$sortname</option>"; 
	  child_sorts($id,$SortIDs);
  }
  echo "</select>";
}

function child_sorts($p_id,$abso_id,$types="&nbsp;&nbsp;"){
	$sql="select sortname,id from jp_category where parentid=$p_id  order by px asc ,id asc " ;
	$result=$GLOBALS["db"]->getAll($sql);
	foreach($result as $v){
		extract($v);
		if($abso_id==$id){$select="selected" ;}else{$select="";}
		echo "<option value='$id' $select >".$types."|-$sortname</option>"; 
		child_sorts($id,$abso_id,$types."&nbsp;&nbsp;");
	}
}
?>
<script type="text/javascript">
function nTabs(thisObj,Num){
if(thisObj.className == "active")return;
var tabObj = thisObj.parentNode.id;
var tabList = document.getElementById(tabObj).getElementsByTagName("li");
for(i=0; i <tabList.length; i++)
{
  if (i == Num)
  {
   thisObj.className = "active"; 
      document.getElementById(tabObj+"_Content"+i).style.display = "block";
  }else{
   tabList[i].className = "normal"; 
   document.getElementById(tabObj+"_Content"+i).style.display = "none";
  }
} 
}
</script>

