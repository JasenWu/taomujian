<?php include("CheckAdmin.php")?>
<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<TITLE>新闻分类</TITLE>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<META NAME="copyright"   />
<META NAME="Keywords" CONTENT="" />
<META NAME="Description" CONTENT="" />
<LINK href="Images/style.css" type=text/css rel=stylesheet>
<script language="javascript" src="Script/Admin.js"></script>
</HEAD>
<BODY>
<?php
@$Action=$_GET["Action"];
switch($Action){
  Case "Add" ;
	addFolder();
  	CallFolderView();
	break;
  Case "Del" ;
	$sql="Select * From jp_menu_sort where id=".$_GET["ID"];
	@$result=$db->query($sql);
	@$yes=is_array($row=$db->fetch_assoc($result));
	if($yes){
	   $SortPath=$row["sortpath"];
	   $db->query("delete from  jp_menu_sort where sortpath like '%$SortPath%' ") ;
       $db->query("delete from  honghao_news where sortpath like '%$SortPath%' ");
       echo "<script language=javascript> alert('成功删除本类、子类及所有下属信息条目，点击确定查看类别树！');location.replace('MenuSort.php');</script>" ;
	}	
	break;
  Case "Save" ;
	saveFolder () ;
	break;
  Case "Edit" ;
	editFolder(); 
  	CallFolderView() ;	
	break;
  default ;
	CallFolderView() ;
	break;
}
?>
</BODY>
</HTML>
<?php
//'调用显示节点------------------------------
Function CallFolderView(){
?>
<table width="100%" border="0" cellpadding="3" cellspacing="1" class="input">
  <tr>
    <td height="24" nowrap> <strong>类别树查看管理：</strong> </td>
  </tr>
  <tr>
    <td height="24" align="center" nowrap   ><a href="MenuSort.php?Action=Add&ParentID=0">添加一级分类</a></td>
  </tr>
  <tr>
    <td height="24" nowrap  ><?php   Folder(0) ; ?></td>
  </tr>
</table>
<?php
}
//'列出所有节点------------------------------
Function Folder($id){
  $sql="Select * From jp_menu_sort where parentid=$id  order by px asc " ;
  $row=mysql_query($sql);
  @$result_num=mysql_num_rows($row) ;
  if($result_num==0){ echo "暂无分类" ; exit(); }  //查询是否有记录
  $i=1 ;
  echo "<table border='0' cellspacing='0' cellpadding='0' >" ;
  while($result=mysql_fetch_array($row)){
      extract($result);

	  @$ChildCount=mysql_num_rows(mysql_query("select id from jp_menu_sort where parentid=".$result["id"]));
      $sql1="Select * From jp_menu_sort where parentid=$id order by  id asc " ;
	  $row1=mysql_query($sql1);
	  @$yes=is_array($row1=mysql_fetch_array($row1));
	  if($yes){
	     $FolderType="SortFolderOpen" ;
		 $ListType="SortEndListline" ;
		 $onMouseUp="EndSortChange('a$id','b$id');" ;
	  }else{
	     $FolderType="SortEndFolderClose" ;
		 $ListType="SortListline" ;
		 $onMouseUp="" ;
	  }
	  $parentid==0?$FolderName="<strong>$sortname</strong>":$FolderName=$sortname ;
	  $FolderName="<font color='#FF0000'>".$px."</font>&nbsp;".$FolderName ;
    echo "<tr>";
    echo "<td nowrap id='b$id' class='$FolderType' onMouseUp=$onMouseUp ></td><td nowrap>$FolderName&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" ;
	if($parentid==0){
       echo "<font color='#FF0000'>分类：</font><a href='MenuSort.php?Action=Add&ParentID=$id'>添加</a>" ;
	   echo "<font color='#367BDA'>&nbsp;&nbsp;</font><a href='MenuSort.php?Action=Edit&ID=$id'>修改</a>" ;
	   echo "<font color='#367BDA'>&nbsp;|&nbsp;</font><a href='MenuSort.php?Action=Del&ID=$id'>删除</a>" ; 
	}else{
	   echo "<font color='#367BDA'>&nbsp;&nbsp;</font><a href='MenuSort.php?Action=Edit&ID=$id'>修改</a>" ;
       echo "<font color='#367BDA'>&nbsp;|&nbsp;</font><a href='MenuSort.php?Action=Del&ID=$id'>删除</a>" ; 
	}
    echo "</td></tr>" ;
    if($ChildCount>0){
?>
      <tr id="a<?php echo $id?>" style="display:yes" ><td class="<?php echo  $ListType?>" nowrap></td><td ><?php echo Folder($id) ?></td></tr>
<?php
     }
    $i++;
  }
  echo "</table>" ;
}
//添加节点---------------------------------
Function addFolder(){
  $ParentID=$_GET["ParentID"] ;
  addFolderForm($ParentID) ;
}
//'添加节点表单------------------------------
Function addFolderForm($ParentID){
 if($ParentID==0){
    $ParentPath="0," ;
	$SortTextPath="" ;
  }else{ 
    $sql="Select * From jp_menu_sort where id=$ParentID " ;
	$row=mysql_fetch_array(mysql_query($sql));
	$ParentPath=$row["sortpath"] ;
  }
?>
<table width="100%" border="0" cellpadding="3" cellspacing="1" class="input">
<form name="FolderForm" method="post" action="MenuSort.php?Action=Save&From=Add">
  <input readonly name="ParentID" type="hidden" class="textfield" id="ParentID" size="6" value="<?php echo $ParentID ?>">
  <input readonly name="ParentPath" type="hidden" class="textfield" id="ParentPath" size="10" value="<?php echo $ParentPath ?>">
  <tr>
    <td height="24" nowrap> <img src="Images/Explain.gif" width="18" height="18" border="0" align="absmiddle">&nbsp;<strong>添加类别:</strong> </td>
  </tr>
  <tr>
    <td height="24" nowrap >|&nbsp;根类&nbsp;→&nbsp;<?php if($ParentID<>0){ TextPath($ParentID) ; }?></td>
  </tr>
  <tr>
    <td height="24" >
	<table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="40" nowrap>排序：</td>
		<td  nowrap><input name="px" type="text" class="textfield" id="px" size="20" value="99"></td>
	  </tr>
      <tr>
        <td width="80" nowrap>栏目名称：</td>
		<td  nowrap><input name="SortNameSi" type="text" class="textfield" id="SortNameSi" size="20"></td>
	  </tr>
      <tr>
        <td width="80" nowrap>栏目链接：</td>
		<td  nowrap><input name="url" type="text" class="textfield" id="url" size="20" value="AboutEdit.php"></td>
	  </tr>
      <tr>
	    <td></td><td nowrap><input name="submitSave" type="submit" class="button" id="保存" value="  保存  "></td>
	  </tr>
    </table>
	</td>
  </tr>
</form>
</table>
<br>
<?php
}
//'生成节点文字路径--------------------------
Function TextPath($ID){
  $sql="Select * From jp_menu_sort where id=".$ID ;
  @$row=mysql_query($sql);
  $yes=is_array($result=mysql_fetch_array($row));
  if($yes){
       $SortTextPath=$result["sortname"]."&nbsp;→&nbsp;" ;
       if($result["parentid"]<>0){ TextPath($result["parentid"]) ;}
       echo $SortTextPath ;
  }
}
//'保存添加、修改节点-------------------------
Function saveFolder(){

  if(strlen(trim($_POST["SortNameSi"]))==0){ 
      echo ("<script language=javascript> alert('栏目名称为必填项目！');history.back(-1);</script>") ;
      exit() ;
  }
 
  $From=$_GET["From"] ;
  $SortNameSi=$_POST["SortNameSi"] ;
  $ParentID=$_POST["ParentID"] ;
  $SortPath=$_POST["ParentPath"] ;
  $px=$_POST["px"] ;
  $url=$_POST["url"] ;
  $datebase=" set sortname='$SortNameSi', parentid=$ParentID,sortpath='$SortPath',px='$px',url='$url' ";
  if($From=="Add"){  //添加类别
    $Action="添加类别" ;
	$sql="insert into jp_menu_sort  ".$datebase; //插入一个类别
	mysql_query($sql);
	$ID=mysql_insert_id();  //取得最后一次插入的id
	$SortPath=$SortPath.$ID."," ;
	mysql_query("update jp_menu_sort set sortpath='$SortPath' where id=$ID "); //修改最后插入的SortPath
   }else{   //修改类别
    $Action="修改类别" ;
	$sql="update jp_menu_sort ".$datebase." where id=".$_GET["ID"] ;
	 mysql_query($sql) ;
   }
  echo "<script language=javascript> alert('".$Action."保存成功，点击确定查看类别树！');location.replace('MenuSort.php');</script>" ;
}

//'修改节点---------------------------------
Function editFolder(){
  $ID=$_GET["ID"];
  editFolderForm($ID) ;
}
//'修改节点表单------------------------------
Function editFolderForm($ID){
  $sql="Select * From jp_menu_sort where id=$ID " ;
  @$row=mysql_fetch_array(mysql_query($sql)) ;
  extract($row) ;
?>
<table width="100%" border="0" cellpadding="3" cellspacing="1"  class="input">
<form name="FolderForm" method="post" action="MenuSort.php?Action=Save&From=Edit&ID=<?php echo $id ?>">
  <input readonly name="ParentID" type="hidden" class="textfield" id="ParentID" size="6" value="<?php echo $parentid ?>">
  <input readonly name="ParentPath" type="hidden" class="textfield" id="ParentPath" size="10" value="<?php echo $sortpath ?>">
  <tr>
    <td height="24" nowrap> <strong>修改类别：</strong> </td>
  </tr>
  <tr>
    <td height="24" nowrap >|&nbsp;根类&nbsp;→&nbsp;<?php if($parentid<>0){TextPath($parentid);}?></td>
  </tr>
  <tr>
    <td height="24" >
	
    <table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="40" nowrap>排序：</td>
		<td  nowrap><input name="px" type="text" class="textfield" id="px" size="20" value="<?php echo $px ?>"></td>
	  </tr>
      <tr>
        <td width="80" nowrap>栏目名称：</td>
		<td  nowrap><input name="SortNameSi" type="text" class="textfield" id="SortNameSi" size="20" value="<?php echo $sortname ?>"></td>
	  </tr>
      <tr>
        <td width="80" nowrap>栏目链接：</td>
		<td  nowrap><input name="url" type="text" class="textfield" id="url" size="20" value="<?php echo $url ?>"></td>
	  </tr>
      <tr>
	    <td></td><td nowrap><input name="submitSave" type="submit" class="button" id="保存" value="  保存  "></td>
	  </tr>
    </table>
    </td>
  </tr>
</form>
</table>
<br>
<?php
}
?>
<br><br>