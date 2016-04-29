<?php include("CheckAdmin.php")?>
<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<TITLE>Banner列表</TITLE>
<LINK href="Images/style.css" type=text/css rel=stylesheet>
<script language="javascript" src="Script/Admin.js"></script>
</HEAD>
<BODY>
<?php 
@$Result=$_GET["Result"] ;
@$Keyword=trim($_GET["Keyword"]) ;
@$SortID=$_GET["SortID"] ;
@$SortPath=$_GET["SortPath"] ;
if($Result=="News"){
  $Keyword=trim($_POST["Keyword"]) ;
}

//home_pic($db,"19","../xml/bcastr.xml") ;// 中文 ;
//home_pic($db,"19","../en/xml/bcastr.xml",1) ;// 英文 ;
function home_pic($db,$picid,$url,$types="0")
{
 $info="<?xml version='1.0' encoding='utf-8'?>\r\n";
 $info.="<bcaster autoPlayTime='3'>\r\n";
 $sql="select type1,news_name,news_content from jp_news where sortid=".$picid." and type2 like '%$types%' " ;
 $result=$db->getAll($sql);
 $i=0;
 foreach($result as $value){  
  // if($types=="0"){ 
      $info.="<item item_url='http://".$_SERVER['HTTP_HOST'].$value["type1"]."' link='javascript:void(0);'></item>\r\n";
    //}else{
	  //$info.="<list path='http://".$_SERVER['HTTP_HOST'].$value["type1"]."' smallpath='http://".$_SERVER['HTTP_HOST'].str_replace("Uploadfiles/images/","Uploadfiles/_thumbs/Images/",$value["type1"])."' smallinfo='".$value["news_content"]."'>javascript:void(0)</list>\r\n"; 
   // }
   $i++;
 }	

 $info.="</bcaster>\r\n";
 $f=fopen($url,"w");
 fwrite($f,iconv("UTF-8","gb2312",$info));
 fclose($f);
}
?>
<!--


</bcaster>
-->
        




<table width="100%" border="0" cellpadding="3" cellspacing="1"  class="input">
  
  <tr>
    <td height="36" align="left" nowrap  bgcolor="#EBF2F9"  style="padding-left:20px;"><table width="86%" border="0" cellspacing="0">
      <tr>
        <form name="formSearch" method="get" action="?Result=Search">
          <td width="52%" nowrap> Banner检索：关键字：<input name="Keyword" type="text" class="textfield" value="<?php echo  $Keyword ?>" size="10">
          <input name="submitSearch" type="submit" class="button" value="检索">
          </td>
        </form>
        
      </tr>
    </table>      </td>    
  </tr>
</table>
<br>

<table width="93%" border="0" cellpadding="3" cellspacing="1" class="input">
  <form action="DelContent.php?Result=jp_news" method="post" name="formDel" >
    <tr >
      <td width="55" nowrap ><strong>ID</strong> </td>
      <td width="60%"  ><strong>Banner标题</strong> </td>
      <td width="95" nowrap ><strong>Banner类别</strong></td>
      <td width="86" nowrap ><strong>发布时间 </strong></td>
      <td  width="129" nowrap ><strong>操作 </strong>
          <input onClick="CheckAll(this.form)" name="buttonAllSelect" type="button" class="button"  id="submitAllSearch" value="全" style="HEIGHT: 18px;WIDTH: 16px;">
      <input onClick="CheckOthers(this.form)" name="buttonOtherSelect" type="button" class="button"  id="submitOtherSelect" value="反" style="HEIGHT: 18px;WIDTH: 16px;">      </td>
    </tr>
    <?php   NewsList($Keyword) ;?>
    <tr><td colspan="6">&nbsp;</td></tr>
    <tr bgcolor='#EBF2F9' >
	  <td colspan="6">
		 <div class="sabrosus"  style="font-size:12px; margin:0px; padding-top:0px;"><?php echo $db->pageft($page,$num,$pageSize,1,1,1,10); ?></div>
	  </td>
	</tr>
	</form>
</table>
<Br><br>
</BODY>
</HTML>
<?php 
function NewsList($Keyword){
   global $page,$pageSize,$num ;
   @$page=$_GET["page"];
   if((!$page)|| $page<1) $page=1;
   $pageSize=10;
   $firstcount = ($page -1) * $pageSize;
   $sql="select * from jp_news where sortpath like '%0,20,%' order by id desc " ;
   if($Keyword){
      $sql="select * from jp_news where sortpath like '%0,20,%' and (news_name like '%$Keyword%' or news_content like '%$Keyword%' ) order by id desc " ;
   }
   @$result=$GLOBALS["db"]->query($sql) ;
   global $num;
   @$num = $GLOBALS["db"]->num_rows($result);
   if($num>0){
	 $sql.=" limit $firstcount,$pageSize " ;
	 $row=$GLOBALS["db"]->query($sql);
	 $i=1;
	 while($result=$GLOBALS["db"]->fetch_assoc($row)){
	     extract($result);
		 echo "<tr>";
		 echo "<td>$i</td>" ;
	     echo "<td><img src='".str_replace("/Uploadfiles/images/","/Uploadfiles/_thumbs/Images/",$type1)."' >$news_name</td>" ;
		 echo "<td>" ;
		 echo  SortText($sortid)  ;
		 echo "</td>" ;
		 echo "<td>".date('Y-m-d',$add_time)."</td>" ;
		 echo "<td><a href='PicEdit.php?Result=Modify&ID=".$id."' onClick=changeAdminFlag('修改Banner信息')>修改</a>&nbsp;&nbsp;&nbsp;&nbsp;<input name='selectID[]' type='checkbox' value='".$id."' style='HEIGHT: 13px;WIDTH: 13px;'></td>" ;
		 echo "</tr>";
	     $i++;
	   }
	   echo "<tr><tD colspan='4'></td><Td><input name='submitDelSelect' type='button' class='button'  id='submitDelSelect' value='删除所选' onClick=ConfirmDel('您真的要删除这些Banner吗？');></td></tr>" ;
	}else{
	  echo "<tr><tD colspan='5'>暂无添加</td></tr>";
	}

}
Function SortText($ID){
  $sql="Select * From jp_category where id=".$ID;
  @$row=$GLOBALS["db"]->query($sql);
  @$yes=is_array($result=$GLOBALS["db"]->fetch_assoc($row));
  if($yes){
     return  $result["sortname"];
  }
}
?>
