<?php
	require 'config.php';
	if(isset($_POST['register']))
	{
		$name = $_POST['name'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$retypepassword = $_POST['retypepassword'];
		
		if($name == "" || $email == "" || $password == "" || $retypepassword == "")
			$warning = "ALL THE FIELDS ARE REQUIRED";
		elseif($password != $retypepassword)
		     echo "Both passwords should be match";
		else
		{
		    $query="select * from `register` where email=$email AND name=$name AND password=$password AND retypepassword=$retypepassword";
		    $sql=mysql_query($query,$con);
		   if(mysqli_num_rows($sql)>0)
			echo "You have already register.. Go to LOGIN";
		    else
		    {
			$query = "INSERT INTO `register`(`name`,`email`,`password`,`retypepassword`)VALUES('$name','$email','$password','$retypepassword')";
			$sql = mysql_query($query,$con);
			if($sql){
			    echo "You have successfully register";
			    header('location:login.php');
			}
			else
			    echo "Error Occured in registration.. Try again";
		    }
		}
	}	
?>
<!DOCTYPE html>
<html>
<head>
   <title>REGISTER</title>
   <link rel="stylesheet" href="register.css">
</head>
<body>
    <h2>REGISTER</h2><br>
    <form action="" method="post">
    	<?php if(isset($warning)) echo $warning; ?>
        NAME<input type="text" name="name" placeholder="enter your name"><br>
        EMAIL<input type="text" name="email" placeholder="enter your email"><br>
        PASSWORD<input type="password" name="password" placeholder="enter your password"><br>
        RETYPEPASSWORD<input type="password" name="retypepassword" placeholder="conform password"><br><br>
        <input type="submit" name="register" value="REGISTER">
    </form>
</body>
</html>
