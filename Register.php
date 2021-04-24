<?php

session_start();
include('connect_to_database.php');
if(isset($_POST["cancel"]))
{
	//echo "<script>confirm('Are you sure cancel Resistration ?')</script>";
	header("location: index.php");
	exit();
}

if(isset($_POST["register"]))
{
	$rname=$_POST["name"];
	$rdob=$_POST["dob"];
	$rcontact=$_POST["contact"];
	$rage=$_POST["age"];
	$remail=$_POST["email"];
	$rtawn=$_POST["tawn"];
	$rtehsil=$_POST["tehsil"];
	$rdist=$_POST["dist"];
	$rstate=$_POST["state"];
	$rpin=$_POST["pincode"];
	$rpass=$_POST["password"];
	$rcpass=$_POST["cpassword"];
	//*******************************************************
	//** here check filled up information is correct or not**
	//*******************************************************
	if($rname=="")
	{
		echo "<script>alert('Please,Enter your name')</script>";
		exit();
	}
	if($rdob=="")
	{
		echo "<script>alert('Please,Enter your birth date')</script>";
		exit();
	}
	if($rage=="")
	{
		echo "<script>alert('Please,Enter your age')</script>";
		exit();
	}
	if($rcontact=="")
	{
		echo "<script>alert('Please,Enter your contact number')</script>";
		exit();
	}
	If(strlen($rcontact)>10)
	{
		echo "<script>alert('contact is wrong, please correct it')</script>";
	}
	if($remail=="")
	{
		echo "<script>alert('Please,Enter your email address')</script>";
		exit();
	}
	if($rtawn=="")
	{
		echo "<script>alert('Please,Enter your tawn/village name')</script>";
		exit();
	}
	if($rtehsil=="")
	{
		echo "<script>alert('Please,Enter your Tehsil name')</script>";
		exit();
	}
	if($rdist=="")
	{
		echo "<script>alert('Please,Enter your Dist name')</script>";
		exit();
	}
	if($rstate=="")
	{
		echo "<script>alert('Please, select your state')</script>";
		exit();
	}
	if($rpin=="")
	{
		echo "<script>alert('Please, enter your pin code')</script>";
		exit();
	}
	If(strlen($rpin)>6)
	{
		echo "<script>alert('Pin code is wrong, please correct it')</script>";
	}
	if($rpass=="")
	{
		echo "<script>alert('please,Enter password')</script>";
		exit();
	}
	if($rpass!=$rcpass)
	{
		echo "<script>alert('Please, Enter password and Confirm password same')</script>";
		exit();
	}
	$length=strlen("$rpass");
	If($length<5)
	{
		echo "<script>alert('Please enter length of password between 5 to 13 characters..')</script>" ;
		exit();
	}
	If($length>=13)
	{
		echo "<script>alert('Please enter length of password between 5 to 13 characters..')</script>" ;
		exit();
	}
	//***********************************************************
	//** here accept data from form *****************************
	//***********************************************************
	$iname=mysqli_real_escape_string($conn,$rname);
	$idob=mysqli_real_escape_string($conn,$rdob);
	$iage=mysqli_real_escape_string($conn,$rage);
	$icontact=mysqli_real_escape_string($conn,$rcontact);
	$iemail=mysqli_real_escape_string($conn,$remail);
	$itawn=mysqli_real_escape_string($conn,$rtawn);
	$itehsil=mysqli_real_escape_string($conn,$rtehsil);
	$idist=mysqli_real_escape_string($conn,$rdist);
	$istate=mysqli_real_escape_string($conn,$rstate);
	$ipin=mysqli_real_escape_string($conn,$rpin);
	$ipass=mysqli_real_escape_string($conn,$rpass);
	//****************************************************************************
	//****  here student's enterd data is allready resistered in database or not**
	//****************************************************************************
	$check=mysqli_query($conn,"select name,email,contact from studentregistration Where email='$iemail'");
	$row=mysqli_fetch_array($check);
	if($row['name']==$iname)
	{
	 if($row['contact']==$icontact)
	 {
	   if($row['email']==$iemail)
	   {
		 echo "<script>alert('you are already resistered..please enter different name,email,contact number')</script>";
		 exit();
	   }
	  }
	}
	//**************************************************************************************
	//** here, if student is not resistered, after insert data into database,means 
	//Resistration process will be Successfully completed************************************
	//**************************************************************************************
	
	$record=mysqli_query($conn,"insert into studentregistration (name,dob,age,contact,email,tawn,tehsil,dist,state,pincode,password) 
	          VALUES('$iname','$idob','$iage','$icontact','$iemail','$itawn','$itehsil','$idist','$istate',
			            '$ipin','$ipass')");
	if(!$record)
	{
		echo "not Recorded<br>";
	}
	else
	{
		echo "<br>successfully Recorded<br>";
	}
	}
mysqli_close();

?>

<html>

<head>

<title>Registration</title>

</head>
<body background="img/stock-photo-people-that-agree-large-group-of-people-in-the-shape-of-a-check-mark-on-a-white-background-196991246.jpg">
<h1><p align="center"><font color="Blue">Welcome to E-voting System</p></h1>

<form action="Register.php" method="POST">
<div class="head">
<h1>Resistration form</h1>
</div>

<fieldset><legend>Personal Informmation</legend>
<input type="text" name="name" placeholder="Enter Your Full Name" size="35"/>
<input type="text" name="dob" placeholder="date/month/year" size="15" /><br>
<input type="text" name="contact" placeholder="Contact" size="35"/>
<input type="text" name="age" placeholder="Enter Age" size="8"/><br>
<input type="text" name="email" placeholder="Enter E-Mail" size="35"/>
</fieldset>

<fieldset><legend>Address</legend>
<input type="text" name="tawn" placeholder="tawn / Village" />
<input type="text" name="tehsil" placeholder="Taluka / Tehsil" /></br>
<input type="text" name="dist" placeholder="district palce" />

<select name="state" size="1">
<option>Andhrapradesh</option>
<option>Arunachal pradesh</option>
<option>Asam</option>
<option>Bihar</option>
<option>Chhatisgadh</option>
<option>Delhi</option>
<option>Dehradunh</option>
<option>Goa</option>
<option>Gujrat</option>
<option>Hariyana</option>
<option>Himachal Pradesh</option>
<option>Jammu-Kashmir</option>
<option>Keral</option>
<option>Karnataka</option>
<option>Madhya Pradesh</option>
<option>Maharashtra</option>
<option>Manipur</option>
<option>Mizoram</option>
<option>Nagaland</option>
<option>Orisa</option>
<option>pacchim Bangal</option>
<option>Panjab</option>
<option>Rajsthan</option>
<option>Sikkim</option>
<option>Tamilnadu</option>
<option>Telangana</option>
<option>Tripura</option>
<option>Utterakhand</option>
<option>Utter Pradesh</option>
<option>Zarkhand</option>
</select><br>

<input type="text" name="pincode" placeholder="Pin Code" />

</fieldset>
<fieldset>
<legend>Password</legend>
<input type="password" name="password" placeholder="password" />
please , Enter 8 to 13 Characters<br>
<input type="password" name="cpassword" placeholder="confirm password" />
</fieldset>

<fieldset><legend>Submit / Agree</legend>
<input type="checkbox" name="agree" /> Are you Agree with filled information</br>
<div class="button">
<input type="submit"  name="register" value="Register" />
<input type="reset" name="cancel" value="cancel" onclick="alert('Are you sure cancel Registration ?')"/><br>
</div>
<p>Already Registered ?<br><a href="index.php">Login here</a></p>
</fieldset>

</form>
</body>
</html>