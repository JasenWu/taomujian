<?php 
@session_start();
include("../Common/conn.php") ; 
@$AdminAction=$_GET["AdminAction"];
switch($AdminAction){
   case "Out" ;
      OutLogin();
	  break;
   default ;
    //  Login() ;
	 // break;
}
function OutLogin(){ 
  session_unset();
  echo "<script language=javascript>top.location.replace('AdminLogin.php');</script>" ;
}
function Login(){	
  if(isset($_SESSION["login_id"]) && isset($_SESSION["login_vig"]) && isset($_SESSION["login_adminname"]) ) {
	$sql="select adminname,password from jp_admin where ID=".$_SESSION["login_id"] ;
    @$row=mysql_query($sql);
	@$yes=is_array($row=mysql_fetch_array($row)) ;
	if($yes){
	    $AdminName=$row["adminname"];
		$Password=$row["password"];
	    $veri=md5($AdminName.$Password."veri") ;
		if($veri!=$_SESSION["login_vig"]){
		   echo "您还没有登录或登录已超时，请<a href='AdminLogin.php' target='_parent'><font color='red'>返回登录</font></a>!" ;
	       exit();
		}
	}
  
  } else{
       echo "您还没有登录或登录已超时，请<a href='AdminLogin.php' target='_parent'><font color='red'>返回登录</font></a>!" ;
	   exit();
  } 
}

function show_select($types,$SortIDs){ //下来显示信息的类别
  $sql="select sortname,id from jp_category where parentid=$types  " ;
  $result=$GLOBALS["db"]->getAll($sql);
  echo "<select name='SortID'>";
  foreach($result as $v){
	  extract($v);
	  if($SortIDs==$id){$select="selected" ;}else{$select="";}
	  echo "<option value='$id' $select >$sortname</option>"; 
	  child_sort($id,$SortIDs);
  }
  echo "</select>";
}

function child_sort($p_id,$abso_id){
	$sql="select sortname,id from jp_category where parentid=$p_id  " ;
	$result=$GLOBALS["db"]->getAll($sql);
	foreach($result as $v){
		extract($v);
		if($abso_id==$id){$select="selected" ;}else{$select="";}
		echo "<option value='$id' $select >&nbsp;&nbsp;|-$sortname</option>"; 
	}
}

function escape_character($result)
{
   return str_replace("'","",$result);
   //return addslashes($result);
}
?>

 