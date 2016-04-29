<?php include("CheckAdmin.php")?>
<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<META NAME="copyright"   />
<META NAME="Author"   />
<META NAME="Keywords" CONTENT="" />
<META NAME="Description" CONTENT="" />
<TITLE>编辑新闻</TITLE>
<LINK href="Images/style.css" type=text/css rel=stylesheet>
<script language="javascript" src="Script/Admin.js"></script>
<script language="javascript" >
 function check_add(){
    if(document.editForm.AdminName.value==""){alert("请填写管理员帐号");document.editForm.AdminName.focus();return false;}
	return true;
 }
</script>
<style type="text/css">
.vip_register{width:310px; float:left;  }

.vip_register li{height:35px; line-height:35px; float:left; width:310px; color:##003f7b}
.vip_register p{width:285px; float:left; padding-left:20px; margin-bottom:8px;}
.vip_register span{color:#333;}
</style>
</HEAD>
<BODY>
<?php
@$ID=$_GET["ID"];
@$Result=$_GET["Result"];
AdminEdit($ID) ;
?>

<br>
<table width="100%"  border="1" style="border:#6298E1 tthin solid;" cellpadding="3" cellspacing="1" class="input">
  <form name="editForm" method="post" action="MemberEdit.php?Action=SaveEdit&Result=<?php echo $Result ?>&ID=<?php echo $ID ?>"  onSubmit="return check_add();" >
    <tr>
      <td height="24" nowrap ><table width="100%" border="0" cellpadding="0" cellspacing="0"   idth="100%">
          <tr>
            <td width="120" height="20" align="right">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td colspan="2">
              <div class="vip_register">
                    <ul>
                      <li><strong>会员注册账户信息：</strong></li>
                      <li><span>注册账号:</span>
                        <input type="text" name="uname" class="login_input" maxlength="50" value="<?php echo isset($uname)?$uname:""?>" />
                        * </li>
                      <li><span>设置密码:</span>
                        <input type="password" name="password" class="login_input" maxlength="50"/>
                        * </li>
                      <li><strong>会员注册信息验证资料</strong>：</li>
                      <li><span>客户姓名:</span>
                        <input type="text" name="cname" class="login_input2" maxlength="50" value="<?php echo isset($cname)?$cname:""?>"/>
                        * </li>
                      <li><span>出生日期:</span>
                        <input type="text" name="birthday" class="login_input2" maxlength="50" value="<?php echo isset($birthday)?$birthday:""?>"/>
                        *</li>
                      <li><span>国&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;籍:</span>
                        <input type="text" name="nationality" class="login_input2" maxlength="50" value="<?php echo isset($nationality)?$nationality:""?>"/>
                        *</li>
                      <li><span>所属行业:</span>
                       <input type="text" name="industry" class="login_input2" maxlength="20" value="<?php echo isset($industry)?$industry:""?>"/>
                        *</li>
                      <li><span>贸易类型:</span>
                         <input type="text" name="trade_type" class="login_input2" maxlength="20" value="<?php echo isset($trade_type)?$trade_type:""?>"/>
                         *</li>
                      <li><span>所属企业:</span>
                        <input type="text" name="ssqy" class="login_input2" maxlength="50" value="<?php echo isset($ssqy)?$ssqy:""?>"/>
                      </li>
                      <li><span>成立年限:</span>
                        <input type="text" name="clnx" class="login_input2" maxlength="50" value="<?php echo isset($clnx)?$clnx:""?>"/>
                      </li>
                      <li><span>企业规模:</span>
                        <input type="text" name="qygm" class="login_input2" maxlength="50" value="<?php echo isset($qygm)?$qygm:""?>"/>
                      </li>
                      <li><span>企业网站:</span>
                        <input type="text" name="website" class="login_input2" maxlength="50" value="<?php echo isset($website)?$website:""?>"/>
                      </li>
                      <li><span>联系方式:</span>
                        <input type="text" name="contacts" class="login_input2" maxlength="50" value="<?php echo isset($contacts)?$contacts:""?>"/>
                        * </li>
                      <li><span>联系邮箱:</span>
                        <input type="text" name="email" class="login_input2" maxlength="50" value="<?php echo isset($email)?$email:""?>"/>
                        * </li>
                      <li style="color:#333"> 通过何种方式找到我们:
                         <input type="text" name="findus" class="login_input2" maxlength="20" value="<?php echo isset($findus)?$findus:""?>"/>
                      </li>
                      <li style="color:#333"> 是否通过审核:
                         <input type="radio" name="flag" value="1" <?php echo isset($flag)?$flag==1?"checked":"":"checked"?>> 通过
                         <input type="radio" name="flag" value="0" <?php echo isset($flag)?$flag==0?"checked":"":""?>> 不通过
                      </li>
                      
                    </ul>
                  </div>
            </td>
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
function AdminEdit($ID){
   @$Action=$_GET["Action"];
   @$Result=$_GET["Result"];
   if($Action=="SaveEdit"){  //添加修改数据
      $uname=$_POST["uname"];
      $password=$_POST["password"];
      $cname=$_POST["cname"];
	  $birthday=$_POST["birthday"];
	  $nationality=$_POST["nationality"];
	  $industry=$_POST["industry"];
	  $trade_type=$_POST["trade_type"];
	  
	  $ssqy=$_POST["ssqy"];
	  $clnx=$_POST["clnx"];
	  $qygm=$_POST["qygm"];
	  $website=$_POST["website"];
	  $contacts=$_POST["contacts"];
	  $email=$_POST["email"];
	  $findus=$_POST["findus"];
	  $flag=$_POST["flag"];
	 if($Result=="Add"){	
	    //判断帐号是否已经注册开始
	    $sql="select id from `jp_member` where uname ='$uname' " ;
        $reg=$GLOBALS["db"]->getOne($sql);
        if($reg){echo "<script>alert('该帐号已经注册过了，请换一个');history.back();</script>";exit();}
		//判断帐号是否已经注册结束
		$sql="insert into `jp_member` set uname='".$uname."',cname='".$cname."',birthday='".$birthday."',nationality='".$nationality."',industry='".$industry."',trade_type='".$trade_type."',ssqy='".$ssqy."',clnx='".$clnx."',qygm='".$qygm."',website='".$website."',contact='".$contacts."',email='".$email."',findus='".$findus."',flag='".$flag."' ,addtime='".mktime()."' " ;
		$GLOBALS["db"]->query($sql);
	 }elseif($Result=="Modify"){
		//判断帐号是否已经注册开始
	    $sql="select id from `jp_member` where uname='$uname' and id<>".$ID ;
        $reg=$GLOBALS["db"]->getOne($sql);
        if($reg){echo "<script>alert('该帐号已经注册过了，请换一个');history.back();</script>";exit();}
		//判断帐号是否已经注册结束
	    $sql="update `jp_member` set uname='".$uname."',cname='".$cname."',birthday='".$birthday."',nationality='".$nationality."',industry='".$industry."',trade_type='".$trade_type."',ssqy='".$ssqy."',clnx='".$clnx."',qygm='".$qygm."',website='".$website."',contact='".$contacts."',email='".$email."',findus='".$findus."',flag='".$flag."' " ;
		if($password){$sql=$sql." ,password='".md5($password)."' ";}
		$sql=$sql." where id=".$ID ;
		$GLOBALS["db"]->query($sql);
	 }
	 echo "<script>alert('成功编辑管理员信息！');location.href='MemberList.php';</script>";
  }else{   //提取信息
     //$Types="";
     if($Result=="Modify"){
	    $sql="select * from `jp_member` where id=". $ID ;
		@$result=$GLOBALS["db"]->query($sql);
	    @$yz=is_array($row=$GLOBALS["db"]->fetch_assoc($result));
	    if($yz){  
		     global $uname,$password,$cname,$birthday,$nationality,$nationality,$industry,$trade_type,$ssqy,$clnx,$qygm,$website,$contact,$email,$findus,$addtime,$contacts,$flag ;
			 extract($row);
			 $uname=$uname ;
			 $password=$password;
			 $cname=$cname;
			 $birthday=$birthday;
			 $nationality=$nationality;
			 $industry=$industry;
			 $trade_type=$trade_type;
			 $ssqy=$ssqy;
			 $clnx=$clnx;
			 $qygm=$qygm;
			 $website=$website;
			 $contact=$contact;
			 $email=$email;
			 $findus=$findus;
			 $addtime=$addtime;
			 $contacts=$contact;
			 $flag=$flag;
		}
	 }
  }
}
?>