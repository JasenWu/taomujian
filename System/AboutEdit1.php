<?php include("CheckAdmin.php")?>
<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<META NAME="copyright"   />
<META NAME="Keywords" CONTENT="" />
<META NAME="Description" CONTENT="" />
<TITLE>编辑公司</TITLE>
<LINK href="Images/style.css" type=text/css rel=stylesheet>
<script language="javascript" src="Script/Admin.js"></script>
<script charset="utf-8" src="../kind_editor/kindeditor.js"></script>
<style type="text/css">
.content_box_three{width:300px; float:left; background:url(../images/box_threebg.gif) no-repeat right; height:220px; padding:0px 0px 0px 12px;}
.home_pro{width:300px; float:left;}
.home_pro_left{width:130px; float:left; padding:0px 10px;}
.home_pro_left img{border:1px solid #cfdced;}
.home_pro_left h2{height:32px; line-height:32px; font-size:12px;}
.home_pro_left p{float:left; padding-top:6px; width:120px;}
.home_pro_right{width:130px; float:right; padding:5px 10px;}

.pro_more{padding-left:5px; float:left;}
.home_pro_left a{color:#333; text-decoration:none;}
.home_pro_left a:hover{color:#005aa4; text-decoration:underline;}
</style>
</HEAD>
<BODY>
<?php 
$ID=$_GET["id"];
show_result($ID) ;
AboutEdit($Result,$ID) ; 
?>

<table width="90%" border="0" cellpadding="3" cellspacing="1"  class="input">
  <form name="editForm" method="post" action="AboutEdit1.php?Action=SaveEdit&Result=<?php echo $Result ?>&id=<?php echo $ID ?>">
    <input name="px" type="hidden" class="textfield" id="px" style="WIDTH: 240;" value="0" >
  <tr>
    <td height="24" nowrap ><table width="100%" border="0" cellpadding="0" cellspacing="0" id=editProduct idth="100%">

      <tr>
        <td width="120" height="20" align="right">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr >
        <td height="20" align="right" valign="top">首页标题信息：
		<td>
         <input type="text" name="ContentSi" value="<?php echo @$ContentSi ?>" style="WIDTH: 240;">
        </td>
      </tr>
       <tr>
            <td height="20" align="right">中文关键字：</td>
            <td><input name="keyword" type="text" class="textfield" id="title" style="WIDTH: 240;" value="<?php echo @$keyword ?>" maxlength="100"></td>
      </tr>
      <tr>
        <td height="20" align="right" valign="top">中文描述：</td>
		<td><textarea name="description" rows="8" class="textfield" id="description" style="WIDTH: 50%; height:50px;"   ><?php echo @$description ?></textarea></td>
       </tr>
      
	  
      <tr>
        <td colspan="2" height="20"></td>
      </tr>
       <tr >
        <td height="20" align="right" valign="top"><strong>英文标题</strong>：
		<td><input type="text" name="ContentEn" value="<?php echo @$ContentEn ?>" style="WIDTH: 240;" ></td>
      </tr>
      <tr style="display:none;">
            <td height="20" align="right"><strong>栏目名称(英文)</strong>：</td>
            <td><input name="title" type="text" class="textfield" id="title" style="WIDTH: 240;" value="<?php echo @$title ?>" maxlength="100"></td>
      </tr>
      <tr>
            <td height="20" align="right"><strong>英文关键字</strong>：</td>
            <td><input name="keyword_en" type="text" class="textfield" id="title" style="WIDTH: 240;" value="<?php echo @$keyword_en ?>" maxlength="100"></td>
      </tr>
      <tr>
        <td height="20" align="right" valign="top"><strong>英文描述</strong>：</td>
		<td><textarea name="description_en" rows="8" class="textfield" id="description_en" style="WIDTH: 50%; height:50px;"   ><?php echo @$description_en ?></textarea></td>
      </tr>
     <tr>
	    <TD colspan="2">&nbsp;</TD>
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
<Br><br>
</BODY>
</HTML>
<?php 
function  AboutEdit($Result,$ID){ //htmlentities($clean['username'], ENT_QUOTES, 'UTF-8');
  @$Action=$_GET["Action"];
  if($Action=="SaveEdit"){
	 $date_fiels=" set `content`='".escape_character($_POST["ContentSi"])."',`content_en`='".escape_character($_POST["ContentEn"])."',`sortname`='".escape_character($_POST["title"])."',`keyword`='".escape_character($_POST["keyword"])."',`keyword_en`='".escape_character($_POST["keyword_en"])."',`description`='".escape_character($_POST["description"])."',`description_en`='".escape_character($_POST["description_en"])."',m_id='".$ID."' " ;
     if($Result=="Modify"){
	    $sql="update `jp_article` ".$date_fiels." where m_id=".$ID ;
		$GLOBALS["db"]->query($sql);
	 }elseif($Result=="Add"){
	    $sql="insert into  `jp_article` ".$date_fiels ;
		$GLOBALS["db"]->query($sql);
	 }
	   $url=$_SERVER["HTTP_REFERER"] ;
	   echo "<script>alert('成功编辑公司信息！');location.href='$url';</script>";
   }else{
     if($Result=="Modify"){
	     $sql="select * from jp_article where m_id=". $ID;
		 $result=$GLOBALS["db"]->getAll($sql);
		 if(is_array($row=$result["0"])){
		     global $ContentSi,$title,$ContentEn,$keyword_en,$keyword,$description,$description_en;
			 $ContentSi=$row["content"] ;
			 $title=$row["sortname"] ;
			 $ContentEn=$row["content_en"] ;
			 $keyword_en=$row["keyword_en"] ;
			 $keyword=$row["keyword"] ;
			 $description=$row["description"] ;
			 $description_en=$row["description_en"] ;
		}
	 } 
  }
}
function show_result($ID){  //SELECT * FROM  `jp_article` 
  $sql="SELECT id FROM  `jp_article`  where m_id=".$ID;
  $rs=$GLOBALS["db"]->getOne($sql);
  global $Result,$AboutNameSi;
  !empty($rs)?$Result="Modify":$Result="Add";
  $AboutNameSi=$GLOBALS["db"]->getOne("select sortname from jp_menu_sort where id=".$ID);
}
?>
