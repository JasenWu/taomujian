<?php
  // Define database connection constants
  
  	require_once('admin/connectvars.php');
  
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	$dbc->set_charset("utf8");
	
	//硬标签
    $query = "SELECT * FROM jp_article where id = 5";
	$data = mysqli_query($dbc, $query);
	$row = mysqli_fetch_array($data);
	
	//硬标签内芯
	$query02 = "SELECT * FROM jp_article where id = 6";
	$data02 = mysqli_query($dbc, $query02);
	$row02 = mysqli_fetch_array($data02);
	
	//软标签及定制
	$query03 = "SELECT * FROM jp_article where id = 7";
	$data03 = mysqli_query($dbc, $query03);
	$row03 = mysqli_fetch_array($data03);
	
?>

     <!--head start-->
  <?php include "include/head.php"; ?>
    <!--head end-->
    <!--body start-->
    <div class="g-full-center main_wrap ">
       	
        
       <dl class="f-oh products_main">
       		<dd class="f-fl products_main_left">
            	<h1 class="products_title">产品与服务<span class="f-fr">&gt;&gt;</span></h1>
                <ul class="left_nav JS_products_nav">
                	<li><a class="on" href="javascript:void(0)">硬标签</a></li>
                    <li><a href="javascript:void(0)">硬标签内芯</a></li>
                    <li><a href="javascript:void(0)">软标签及定制</a></li>
                    
                </ul>
            
            </dd>
            <dd class="f-fl products_main_right">
            
                <div>
                	<ul class="show_products JS_show_products">
                    	<li class="on">
                        		<h1 class="about_us_title">硬标签</h1>
                                <?php
                                 echo   $row['content'];								 
								 ?>
                        		
                        </li>
                        <li>
                        		<h1 class="about_us_title">硬标签内芯</h1>
                        		 <?php
                                 echo   $row02['content'];								 
								 ?>
                        </li>
                        
                        <li>
                        		<h1 class="about_us_title">软标签及定制</h1>
                                 <?php
                                 echo   $row03['content'];								 
								 ?>
                        		
                        </li>
                    </ul>
                
                
                	
                </div>
            </dd>
       </dl>
        

       

        
      


    </div>


   


  
 <?php include "include/footer.php"; ?>
 
 
 
 
    	
</body>

</html>
