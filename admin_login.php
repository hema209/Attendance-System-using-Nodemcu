<?php
    session_start();
	$username="";
	$password="";
	$cpassword="";
	$errors=array();
	//connect to database
	$db= mysqli_connect("localhost","root","","project");
	
	//if register button is clicked
	if(isset($_POST['login']))
	{
		$username=mysqli_real_escape_string($db,$_POST['username']);
		$password=mysqli_real_escape_string($db,$_POST['password']);
			
	}
		if($username=='hemangi' && $password=='hemangi')
		header('Location:userlog.html');
		
		
		
	
?>
<html>
<head>
<title>login page</title>

<style>
.box
{
background-color:white;
width:40%;
}

.input100 {
  font-family: Raleway-Medium;
  color: #555555;
  line-height: 1.2;
  font-size: 18px;

  display: block;
  width: 50%;
  background: transparent;
  height: 55px;
  padding: 0 25px 0 25px;
}
.button {
  border-radius: 4px;
  background-color: #A9A9A9;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 20px;
  padding: 15px;
  width: 140px;
  margin: 5px;
}
label{text-indent: -175px;}
</style>
</head>
<body style="background-color:#F5F5F5">
<br>
<br>
<br>
<br>
     <center>
	<div class="box">
	<br>
	<br>
	<h2>ACCOUNT LOGIN</h2>
	
	<br>
	<br>
	<form action="admin_login.php" method="post">
		<label><h4>USERNAME:</h4></label>
		<input name="username" type="text" class="input100" placeholder="Type your username" required /><br><br>
		<label><h4>PASSWORD: </h4></label>
		<input name="password" type="password" class="input100" placeholder="Type your password" required /><br><br>
		<input name="login" type="submit" class="button" value="Login"/></br>
		<br>
		<br>
	</form>
	
	
	</div>
    <center>

</body>
</html>