
     <!--head start-->
  <?php include "include/head_zh.php"; ?>
    <!--head end-->
    <!--body start-->
    <div class="g-full-center main_wrap  ">     

        <dl class="f-oh contact_us">
            <dd class="f-fl contact_us_left">
                <h2>联系我们</h2>
                <div>
                    <h3>上海办事处：</h3>
                    <table>
                    	<tr>
                            <td class="left_title">地址：</td>
                            <td>上海市张杨路1328号1501室</td>
                        </tr>
                        <tr>
                            <td class="left_title">联系人：</td>
                            <td>吴维江</td>
                        </tr>
                        <tr>
                            <td class="left_title" >联系电话:</td>
                            <td>13917619277</td>
                        </tr>
                        <tr>
                            <td class="left_title"> 邮箱：</td>
                            <td>794476291@qq.com</td>
                        </tr>
                        <!--
                         <tr>
                            <td class="left_title">Skype：</td>
                            <td>taomujian68</td>
                        </tr>
                        -->
                        <tr>
                            <td class="left_title">QQ：</td>
                            <td>794476291</td>
                        </tr>
                    </table>
                    
                </div>
            </dd>
            <dd class="f-fr contact_us_right">
                <h1 class="contact_us_right_title">
                    <b>快速留言</b>
                    <span></span>

                </h1>
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <table class="contact_us_right_table">
                    <tr>
                        <td class="contact_us_right_table_title">您的姓名（必填）：</td>
                        <td class="contact_us_right_table_input"><input type="text" name="name" /></td>
                        <td class="contact_us_right_table_ps">仅支持1-12位中文、字母或下划线</td>
                    </tr>
                    <tr>
                        <td class="contact_us_right_table_title">您的手机号码：</td>
                        <td class="contact_us_right_table_input"><input type="text" name="phone" /></td>
                        <td class="contact_us_right_table_ps">请填写您常用的手机号码</td>
                    </tr>
                    <tr>
                        <td class="contact_us_right_table_title">请填写您常用的邮箱：</td>
                        <td class="contact_us_right_table_input"><input type="text" name="email" /></td>
                        <td class="contact_us_right_table_ps">请填写您常用的邮箱</td>
                    </tr>
                    <tr>
                        <td class="contact_us_right_table_title">留言内容（必填）：</td>
                        <td class="contact_us_right_table_input"><textarea name="note"></textarea></td>
                        <td class="contact_us_right_table_ps " style="vertical-align:bottom;">留言内容不能为空</td>
                    </tr>
                    <tr>
                        <td class="contact_us_right_table_title">&nbsp;</td>
                        <td class="contact_us_right_table_input contact_us_right_submit"><input name="submit" class="submit" type="submit" value="提交留言" /></td>
                        <td class="">&nbsp;</td>
                    </tr>
                </table>
               </form> 
            </dd>
        </dl> 
    </div>


   


  
  <?php include "include/footer.php"; ?>
	<?php
       
		 
		
		require_once('admin/connectvars.php');
		$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 
		//mysql_select_db("message", $dbc);
		if(!empty($_POST['submit'])){
			 
			 
			if (!$dbc)
			  {
			  die('Could not connect: ' . mysql_error());
			  }
				  
				  	  
			$sql="INSERT INTO message (name, phone, email, note) VALUES ('$_POST[name]','$_POST[phone]','$_POST[email]','$_POST[note]')";
	
			if (!mysqli_query($dbc,$sql)){
			  die('Error: ' . mysql_error());
			  }
			echo "<script>alert('留言成功！谢谢！')</script>";
			mysqli_close($dbc);
		}
		
				  
        
        // some code
    
    ?>
    	
</body>

</html>
