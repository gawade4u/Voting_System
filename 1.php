<?php
	
	session_start();	
	$email=$_SESSION['email'];
	
	//error_reporting(0);
	include("connect_to_database.php");
	echo $email;
	if($_POST['Akash'])
	{
		/* $sql1 = mysqli_query("SELECT Akash From candidate");
		$count_of_Akash = mysqli_num_rows($sqlh1);
		$count_of_Akash2 = $count_of_Akash + 1;
		mysqli_query("INSERT INTO candidate (Akash) VALUES('$count_of_Akash2')");
		echo $count_of_Akash;*/
	
		$candidate='voted';
		echo "<br>";

		$check_double_voting = mysqli_query($conn,"SELECT email,candidate FROM already_voted Where email=$email,candidate=$candidate ");
		
		while($row = mysqli_fetch_assoc($check_double_voting))
		{	
			$voted_general = $row['candidate'];
		}
		/*check = mysqli_num_rows($check_double_voting_for_candidate);
		if(!$check)
		{
			echo "no rows found";
		}*/
		
		if($voted_general!=='voted')
		{
			$message = "<h3><font color= '#cc0000'>sorry, you already voted candidate</font><h3>";
		}

		else
		{		
				mysqli_query($conn,"INSERT INTO candidate(email,Akash) VALUES('$email','1')");
				$sql_count = mysqli_query($conn,"SELECT Akash FROM candidate WHERE Akash > 0");
				 
				$Akash_count = mysqli_num_rows($sql_count);
				echo "<br>";
				
				$sql_voted= mysqli_query($conn,"INSERT INTO already_voted (email,candidate) VALUES('$email','$candidate')");
				$sql_update = mysqli_query($conn,"UPDATE already_voted SET candidate='voted' WHERE email='$email' LIMIT 1") or die (mysqli_error());

				$message = "<font color='#0000FF'>thanks for voting</font>";
		}
	}
	
	if($_POST['Rishikesh'])
	{
		/*$sqlh1 = mysqli_query("SELECT Rishikesh From candidate");
		$count_of_Rishikesh = mysqli_num_rows($sqlh1);
		$count_of_Rishikesh2 = $count_of_Rishikesh + 1;
		mysqli_query("INSERT INTO candidate (Rishikesh) VALUES('$count_of_Rishikesh')");
		echo $count_of_Rishikesh;*/
		
		$candidate='voted';
		echo "<br />";
		
		
		$check_double_voting = mysqli_query($conn,"SELECT email,candidate FROM already_voted WHERE email=$email,candidate=$candidate ");
		while($row = mysqli_fetch_assoc($check_double_voting))
		{
			$voted_general = $row['candidate'];
		}
		/*check = mysqli_num_rows($check_double_voting_for_candidate);
		if(!$check)
		{
			echo "no rows found";
		}*/

		if($voted_general !== 'voted')
		{
			$message = "<h3><font color= '#cc0000'>sorry, you already voted candidate</font></h3>";
		}

		else
		{
			
				mysqli_query($conn,"INSERT INTO candidate(email,Rishikesh) VALUES('$email','1')");
				$sql_count = mysqli_query($conn,"SELECT Rishikesh FROM candidate WHERE Rishikesh > 0");
				 
				$Rishikesh_count = mysqli_num_rows($sql_count);
				//echo $Rishikesh_count;
				echo "<br />";
				
				$sql_voted= mysqli_query($conn,"INSERT INTO already_voted (email,candidate) VALUES('$email','$candidate')");
				$sql_update = mysqli_query($conn,"UPDATE already_voted SET candidate='voted' WHERE email='$email' LIMIT 1") or die (mysqli_error());
		
				$message = "<font color='#0000FF'>thanks for voting</font>";
			
		}
	}


	if($_POST['Jyoti'])
	{
		/*$sqlh1 = mysqli_query("SELECT Akash From candidate");
		$count_of_Akash = mysqli_num_rows($sqlh1);
		$count_of_Akash2 = $count_of_Akash + 1;
		mysqli_query("INSERT INTO candidate (Akash) VALUES('$count_of_Akash2')");
		echo $count_of_Akash;*/
		
		$candidate='voted';

		echo "<br />";
		
		
		$check_double_voting = mysqli_query($conn,"SELECT email,candidate  FROM already_voted WHERE email=$email,candidate=$candidate ");
		while($row = mysqli_fetch_assoc($check_double_voting))
		{
			$voted_general = $row['candidate'];
		}
		/*check = mysqli_num_rows($check_double_voting_for_candidate);
		if(!$check)
		{
			echo "no rows found";
		}*/

			if($voted_general!=='voted')
			{
				$message = "<h3><font color= '#cc0000'>sorry, you already voted candidate</font></h3>";
			}

			else

			{
				mysqli_query($conn,"INSERT INTO candidate(email,Jyoti) VALUES('$email','1')");
				$sql_count = mysqli_query($conn,"SELECT Jyoti FROM candidate WHERE Jyoti > 0");
				 
				$Jyoti_count = mysqli_num_rows($sql_count);
				//echo $Jyoti_count;
				echo "<br>";
				
				$sql_voted = mysqli_query($conn,"INSERT INTO already_voted (email,candidate) VALUES('$email','$candidate')");
				$sql_update = mysqli_query($conn,"UPDATE already_voted SET candidate='voted' WHERE email='$email' LIMIT 1") or die (mysqli_error());
	       
				$message = "<font color='#0000FF'>thanks for voting</font>";
			}
	}
	mysqli_close();
	
?>


<html>
<head>
	<title>Login Document</title>
	<script type="text/javascript">
		function confirm_vote()
		{
/*155*/	/* var ansver = confirm("are you sure about your choice");
	if(ansver)
	{
		/*alert("you would be redirected");
		top.location = "third_candidate.php";
	}*/

			var x = confirm("confirm voting for this candidate");
			if(x)
			{
				alert("u voted x");
			}
	}
	</script>

	<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body background="img/Vote-background-MGN-jpg.jpg" Width="30"> 
			<center><h1>Welcome to E-voting System</h1><br>
			<h3>Welcome <?php echo "<h3>".$email."</h3>"; ?></h3>
			<h2>Voters<br/></h2><br>
			<?php echo $message ?>
			
	<div id="wrap">
	<form action="1.php" method="POST">
	<table width="859" height="204"  cellspacing="20">
	
	<tr>
		<td ><img src="img/akash.jpg" width="280" height="250" /></td>
		<td ><img src="img/rishi.jpg" width="280" height="250" /></td>
		<td ><img src="img/jyoti.jpg" width="280" height="250" /></td>
	</tr>
	<tr>
		<td ><input type="submit" name="Akash" value="Akash" id="button" />&nbsp;</td>
		<td ><input type="submit" name="Rishikesh" value="Rishikesh" id="button" />&nbsp;</td>
		<td ><input type="submit" name="Jyoti" value="Jyoti" id="button" />&nbsp;</td>
	</tr>
	</form>
	<tr>
		<td >&nbsp;</td>
		<td ><br /><br />
		
		<a href="./index.php"><img alt="" src="img/logout.png" height="50" ></a>
		
		&nbsp;</td>
	</td>

</table>
</div>
</center>
</body>
</html>	
		