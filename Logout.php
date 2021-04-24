<?php
		if(isset($_POST["Logout"]))
		{
			header("location:index.php");
			echo "You are successfully Logout";
			exit();
		}
?>
