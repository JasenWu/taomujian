<?php
include("CheckAdmin.php");


$id=$_POST['id'];
$px=$_POST['px'];

/*$sql="select id from `jp_product` where px='".$px."' and id <>'".$id."'  ";
$info=$GLOBALS["db"]->getAll("$sql");
if(isset($info[0])){ //如果有则，更新
   $GLOBALS["db"]->query("update `jp_product` set px=px+1 where px>=".$px."  ");
}*/
$GLOBALS["db"]->query("update `jp_product` set px=".$px." where id=".$id."  ");

?>