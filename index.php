<?php
	//error_reporting(0);
    session_start();
           
	$email= $_POST['email'];

	$password=$_POST['password'];

	$submit=$_POST['submit'];

	if($submit)
	{
		if($email=="" || $password=="")
        {
			$error = "<font color='red'> name or id cannot be empty</font>";
        }
		else              
		{
			include('connect_to_database.php');
			
			$sql="SELECT email,password From studentregistration";
			$result=mysqli_query($conn, $sql);
			while($row = $result->fetch_assoc())
			{
				$database_email = $row['email'];
				$database_password = $row['password'];	
				if (($email !== $database_email) and ($password !== $database_password))
				{
					echo "done";
					//echo "<script>alert('login successfull')</script>";
                  	$_SESSION['email']= $email;
					$_SESSION['password']= $password;
                	   
					header("LOCATION:1.php");
				}
				else
				{
					$error= "<font color='red'> no match found for name or id, please check the spelliing and try again!</font>";

				}
			}
		}
	}
?>


<html>
	<head>
		<title>Login Form</title>
	</head>
	<body background="img/login.jpg">
		<center>
		<h1>Welcome to E-voting System<br>
			 Login</h1><br>
	
			<div color="blue" id="subsidebar2">
			
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<form action="index.php" method="POST">
				<?php echo "<h2>".$error."<h2>"; ?>
				<br>
			email:	<input type="text" name="email" /><br>
			password:<input type="password" name="password" /><br>
				<input type="submit" name="submit" value="Login" /><br>
		</form>
	    <a href="Register.php">register here</a><br>

		<a href="admin/index.php">Admin login</a>
		<br><br><br><br><br><br><br><br>
		<a  href="aboutus.php">About Us</a> </div>
	</center>
	</body>
</html>
