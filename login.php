<?php
    require 'config.php';
	if(isset($_POST['login']))
	{
		$email = $_POST['email'];
		$password = $_POST['password'];
		
		$query = "select * from `register` where email=$email AND password=$password";
		$sql = mysql_query($query,$con);
		if(mysqli_num_rows($sql)>0)
			header('location:news.php');
        	else
			echo "Invalid credentials ";
	}
?>
<!DOCTYPE html>
<html>
<head>
   <title>LOGIN</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <h2>LOGIN</h2>
    <form action="" method="post">
        EMAIL<input type="text" name="email" placeholder="enter your email"><br>
        PASSWORD<input type="text" name="password" placeholder="enter your password"><br>
        <input type="submit" name="login" value="LOGIN">
    </form>
</body>
</html>
