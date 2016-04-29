

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Guitar Wars - Remove a High Score</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
  <h2>桃木剑留言管理系统</h2>

<?php
 //require_once('appvars.php');
  require_once('connectvars.php');

  if (isset($_GET['id']) && isset($_GET['name']) && isset($_GET['phone']) && isset($_GET['email']) && isset($_GET['note'])) {
    // Grab the score data from the GET
    $id = $_GET['id'];
    $name = $_GET['name'];
    $phone = $_GET['phone'];
    $email = $_GET['email'];
    $note = $_GET['note'];
  }
  else if (isset($_POST['id']) && isset($_POST['name']) && isset($_POST['phone'])) {
    // Grab the score data from the POST
    $id = $_POST['id'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
  }
  else {
    echo '<p class="error">对不起, 没有成功删除留言.</p>';
  }

  if (isset($_POST['submit'])) {
    if ($_POST['confirm'] == 'Yes') {
      

      // Connect to the database
      $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 

      // Delete the score data from the database
	  
      $query = "DELETE FROM message WHERE id = $id LIMIT 1";
      mysqli_query($dbc, $query);
      mysqli_close($dbc);

      // Confirm success with the user
      echo '<p>已删除 ' . $name .  ' 的留言信息.';
    }
    else {
      echo '<p class="error">信息未成功删除</p>';
    }
  }
  else if (isset($id) && isset($name) && isset($phone) && isset($email) && isset($note)) {
    echo '<p>确定要删除以下留言？</p>';
    echo '<p><strong>id: </strong>' . $id . '<br /><strong>姓名: </strong>' . $name . '<br /><strong>电话: </strong>' . $phone .
		'<br /><strong>姓名: </strong>' . $name .
      '<br /><strong>留言: </strong>' . $note . '</p>';
    echo '<form method="post" action="removescore.php">';
    echo '<input type="radio" name="confirm" value="Yes" /> Yes ';
    echo '<input type="radio" name="confirm" value="No" checked="checked" /> No <br />';
    echo '<input type="submit" value="Submit" name="submit" />';
    echo '<input type="hidden" name="id" value="' . $id . '" />';
    echo '<input type="hidden" name="name" value="' . $name . '" />';
    echo '<input type="hidden" name="phone" value="' . $phone . '" />';
	 
    echo '</form>';
  }

  echo '<p><a href="admin.php">&lt;&lt; 返回管理</a></p>';
?>

</body> 
</html>
