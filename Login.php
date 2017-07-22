<?php

	$connect = mysqli_connect("localhost","root","","LCS");

	if(isset($_POST['Registration']))
	{
		$email = $_POST['email'];
		$pass = $_POST['pass'];

		$query = "SELECT * FROM users WHERE User_Name='".$_POST['email']."' and password = '".$_POST['pass']."'";
		$run_query=$connect->query($query);
		$get_data=mysqli_fetch_assoc($run_query);
		$flag=0;
		do
		{
			if($email==$get_data['User_Name'] && $pass==$get_data['password'])
			{
				echo "welcome !!";
				$flag=1;
			}	
		}
		while($get_data=mysqli_fetch_assoc($run_query));
		if($flag==0)
			echo "Invalid username or password";
		
	}
?>