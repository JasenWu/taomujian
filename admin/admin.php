
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>桃木剑</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
  <h2>桃木剑</h2>
  <p>留言管理系统</p>
  <hr />

<?php
 // require_once('appvars.php');
  require_once('connectvars.php');

  // Connect to the database 
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

  // Retrieve the score data from MySQL
  $query = "SELECT * FROM message ORDER BY id DESC";
  $data = mysqli_query($dbc, $query);

  // Loop through the array of score data, formatting it as HTML 
  echo '<table style="text-align:center;">';
  echo '<tr><th width = "10%">用户id</th ><th width = "10%">姓名</th><th width = "10%">电话</th><th width = "10%">邮箱</th><th width = "25%">留言内容</th><th width = "20%">操作</th></tr>';
  while ($row = mysqli_fetch_array($data)) { 
    // Display the score data
    echo '<tr class="scorerow"><td><strong>' . $row['id'] . '</strong></td>';
    echo '<td>' . $row['name'] . '</td>';
    echo '<td>' . $row['phone'] . '</td>';
	echo '<td>' . $row['email'] . '</td>';
	echo '<td>' . $row['note'] . '</td>';
    echo '<td><a href="removescore.php?id=' . $row['id'] . '&amp;name=' . $row['name'] .
      '&amp;phone=' . $row['phone'] . '&amp;email=' . $row['email'] .
      '&amp;note=' . $row['note'] . '">删除</a>';
    
    echo '</td></tr>';
  }
  echo '</table>';

  mysqli_close($dbc);
?>

</body> 
</html>