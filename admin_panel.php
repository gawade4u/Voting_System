<?php
function winner($result1 , $result2 , $result3)
{
	$result="";
	$count=0;
	$m=max($result1 , $result2 , $result3);
	if($m==$result1)
	{	if($count>0)
		{
			$result.=" , ";
		}
		$result.="Akash";
		$count++;
	}
	if($m==$result2)
	{
		if($count>0)
		{
			$result.=" , ";
		}
		$result.="Rishikesh";
		$count++;
	}
	if($m==$result3)
	{
		if($count>0)
		{
			$result.=" , ";
		}
		$result.="Jyoti";
		$count++;
	}
	return $result;
}
include('connect_to_database.php');

$sql = mysqli_query($conn,"SELECT Akash From candidate WHERE  Akash > 0");
$result1 = mysqli_num_rows($sql);

$sql2 = mysqli_query($conn,"SELECT Rishikesh FROM  candidate WHERE Rishikesh > 0");
$result2 = mysqli_num_rows($sql2);

$sql3= mysqli_query($conn,"SELECT Jyoti FROM candidate WHERE Jyoti > 0 ");
$result3 = mysqli_num_rows($sql3);

$total_Voters = $result1+$result2+$result3;
echo "<marquee><h1>The Winner is ".winner($result1 , $result2 , $result3);
$x=max($result1 , $result2 , $result3);
echo "<br>Winner have  $x Votes.</h1></marquee>";

//total registered voters
$sql_registered_voters = mysqli_query($conn,"SELECT email FROM studentregistration ") or die(mysqli_error());
$registered_voters = mysqli_num_rows($sql_registered_voters);
?>

<html>
<head>
<title>Admin panel</title>
</head>
<body background="img/13700688-3D-Best-Results-Crossword-on-white-background-Stock-Photo-result.jpg">

<table width="553" height="319" border="1" align="center">
<tr> 
	<td height="28" colspan="2" align="center">ELECTION RESULTS</td>
</tr>
<tr>
<font color="orange">
	<td>Candidates</td>
	<br><td>
	<fieldset id ="results_1">
	 Akash = <?php echo $result1  ?>
	 </fieldset><br>
	 
	<fieldset id="results_2">
	Rishikesh = <?php echo $result2 ?>
	</fieldset><br>
 
	<fieldset id="results_3">
	Jyoti = <?php echo $result3 ?>
	</fieldset><br>

	<fieldset id ="total">
	Total votes for Voting Result = <?php echo $result1 + $result2 + $result3 ?>
	</fieldset><br></td>
</tr>
</table>
</body>
</html>