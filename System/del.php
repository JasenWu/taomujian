<?php
include("CheckAdmin.php");
$pid=isset($_POST["pid"])?$_POST["pid"]:0;
$imgpic=isset($_POST["imgpic"])?$_POST["imgpic"]:0;
$sql="delete from jp_photo where sortid='".$pid."' and id='".$imgpic."' ";
$db->query($sql);
?>