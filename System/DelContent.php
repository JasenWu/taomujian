<?php include("CheckAdmin.php")?>
<?php 
$database=$_GET["Result"];
$SelectID=$_POST["selectID"];
if($SelectID){
  foreach($SelectID as $ID){
	$sql="delete from ".$database." where ID=".$ID ;
	mysql_query($sql);
  }
} 
echo "<script>alert('删除成功！');location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
?> 
 

 