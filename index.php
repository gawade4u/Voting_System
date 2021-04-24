<?php
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
			
					$sql="SELECT email,password From adminlogin";
					$result=mysqli_query($conn, $sql);
					while($row = $result->fetch_assoc())
					{
						$database_email = $row['email'];
						$database_password = $row['password'];
						if(($email == $database_email) && ($password == $database_password))
						{
                  			$_SESSION['email']= $email;
							$_SESSION['password']= $password;
							header("LOCATION:admin_panel.php");
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

<title>Login Document</title>

</head>

<body  bgcolor="pink">

<table width="793" height="60" border="1" align="center">

<tr> 
<h1><p align=center><font color="blue" size="7">Admin Login</font></p></h1>
<form action="index.php" method="POST">

<td width="245" height="28" valign=top"><font size="6" color="orange" style="bold">Admin </font><?php echo $error ?></td>

<td width = "532" valign="top">
<center>
<font color="green" size="5">
Email:  <input type="text" name="email" /><br><br><br>
Password:<input type="password" name="password" /><br><br>
<br>
<input type="submit" name="submit" value="login" /></td>
</tr></font></center>
</form>
     
</table>
<br><br><br><center>
<a href="/CollegeVoting/index.php"><font color="red" size="6" align="center">Home </font></a>
</center>
</body>
</html>