
     <!--head start-->
  <?php include "include/head.php"; ?>
    <!--head end-->
    <!--body start-->
    <div class="g-full-center main_wrap  ">     

        <dl class="f-oh contact_us">
            <dd class="f-fl contact_us_left">
                <h2>Contacts&nbsp;us</h2>
                <div>
                    <h3>&nbsp;</h3>
                    <table class="contact_us_left_en">
                    	<tr>
                            <td class="left_title">Add：</td>
                            <td>Room 1501, No.1328, Zhangyang Road, Pudong New District, Shanghai City</td>
                        </tr>
                        <tr>
                            <td class="left_title">Contacts：</td>
                            <td>Mr.Wang</td>
                        </tr>
                        <tr>
                            <td class="left_title" >Telephone:</td>
                            <td>18930012996</td>
                        </tr>
                        <tr>
                            <td class="left_title"> Email：</td>
                            <td>624893472@qq.com</td>
                        </tr>
                        <!--
                         <tr>
                            <td class="left_title">Skype：</td>
                            <td>taomujian68</td>
                        </tr>
                        -->
                        <tr>
                            <td class="left_title">QQ：</td>
                            <td>624893472</td>
                        </tr>
                    </table>
                    
                </div>
            </dd>
            <dd class="f-fr contact_us_right">
                <h1 class="contact_us_right_title contact_us_right_title_en">
                    <b>Fast Message</b>
                    <span></span>

                </h1>
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <table class="contact_us_right_table contact_us_right_table_en">
                    <tr>
                        <td class="contact_us_right_table_title">Name (Required)：</td>
                        <td class="contact_us_right_table_input contact_us_right_table_input_en"><input type="text" name="name" /></td>
                        <td class="contact_us_right_table_ps">It only supports 1-12 Chinese/English letters or underlines</td>
                    </tr>
                    <tr>
                        <td class="contact_us_right_table_title">Mobile Phone Number：</td>
                        <td class="contact_us_right_table_input contact_us_right_table_input_en"><input type="text" name="phone" /></td>
                        <td class="contact_us_right_table_ps">Please fill in your mobile phone number</td>
                    </tr>
                    <tr>
                        <td class="contact_us_right_table_title">Email：</td>
                        <td class="contact_us_right_table_input contact_us_right_table_input_en"><input type="text" name="email" /></td>
                        <td class="contact_us_right_table_ps">Please fill in your frequently-used E-mail</td>
                    </tr>
                    <tr>
                        <td class="contact_us_right_table_title">Message Contents (Required)：</td>
                        <td class="contact_us_right_table_input contact_us_right_table_input_en"><textarea name="note"></textarea></td>
                        <td class="contact_us_right_table_ps " style="vertical-align:bottom;">Message content cannot be blank</td>
                    </tr>
                    <tr>
                        <td class="contact_us_right_table_title">&nbsp;</td>
                        <td class="contact_us_right_table_input contact_us_right_submit contact_us_right_table_input_en"><input name="submit" class="submit" type="submit" value="Submitting Message" /></td>
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
