<?php
    session_start();
	$CardNumber="";
	$Name="";
	$errors=array();
	//connect to database
	$db= mysqli_connect("localhost","root","","wireless");
	
	//if register button is clicked
	if(isset($_POST['submit_btn']))
	{
		$CardNumber=mysqli_real_escape_string($db,$_POST['CardNumber']);
		$Name=mysqli_real_escape_string($db,$_POST['Name']);
	}
	
	
	//ensure that form fiels are filled properly
	if(empty($CardNumber))
	{
		array_push($errors,"CardNumber is required");
	}
	if(empty($Name))
	{
		array_push($errors,"Name is required");
	}
	
	
	//if there are no errors save the data to users table
	if(count($errors)==0) 
	{
		$sql="insert into adduser(CardNumber,Name) values ('$CardNumber','$Name')";
		mysqli_query($db,$sql);	
		
	}
	

?>

<html>
<head>
<title>adduser page</title><style>
input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>

</head>
<body>

	<center><h2>ADD NEW USER</h2></center>
	<div>
	<form action="adduser.php" method="post">
		<label><h4>CardNumber:</h4></label>
		<input name="CardNumber" type="text" placeholder="type user CardNumber" required >
		
		<label><h4>Name:</h4></label>
		<input name="Name" type="text"  placeholder="type User Name" required /><br>
		
		<input name="submit_btn" type="submit"  value="AddUser"/></br>
		
	</form>
	</div>
	</center>
	
	</div>


</body>
</html>