<?php 
@session_start();
include("../Common/conn.php") ; 
$LoginName=$db->inject_check($_POST["LoginName"]);
$LoginPassword=$db->inject_check($_POST["LoginPassword"]);
$CheckCode=$db->inject_check($_POST["CheckCode"]);
if($CheckCode!=$_SESSION['randcode']){
	echo "<script>alert('验证码错误！');window.location='AdminLogin.php';</script>" ;
    exit();
}
$last_login_time=mktime();  //获取登录时间
$last_login_ip=$db->get_client_ip(); //获取登录ip
$sql="select * from jp_admin where adminname='".$LoginName."' " ;
$result=mysql_query($sql);
@$yes=is_array($row=$db->fetch_assoc($result));
if($yes){	
  if($row["password"]==md5($LoginPassword."webstar")){
     $_SESSION["login_id"]=$row["id"];
	 $_SESSION["login_adminname"]=$row["adminname"];
	 $_SESSION["last_login_time"]=$row["last_login_time"];
	 $_SESSION["last_login_ip"]=$row["last_login_ip"];
	 $_SESSION["login_number"]=$row["login_number"];
	 $_SESSION["login_vig"]=md5($row["adminname"].$row["password"]."veri"); 
	 $db->query("update jp_admin set login_number=login_number+1,last_login_ip='".$last_login_ip."',last_login_time='".$last_login_time."' where id=".$row["id"]);
	 echo "<script language=javascript>location.href='Main.php';</script>" ;
  }else{
     echo "<script language=javascript> alert('用户名密码错误');location.href='AdminLogin.php';</script>" ;}
 }else{
     echo "<script language=javascript> alert('用户名密码错误');location.href='AdminLogin.php';</script>" ;
}
?>

 