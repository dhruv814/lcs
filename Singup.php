<?php

$connect = mysqli_connect("localhost","root","","LCS");

	if(isset($_POST['lock']))
		{
			$pass = $_POST['pass'];
			$email = $_POST['EmailID'];
        
            $query = "SELECT * FROM users WHERE User_Name='".$_POST['EmailID']."' and password = '".$_POST['pass']."'";
            $run_query=$connect->query($query);
            $get_data=mysqli_fetch_assoc($run_query);
            $flag1=0;
            $flag2=0;
            do
            {
                if($get_data['User_Name']==$email && $get_data['password']==$pass)
                {
                    $flag1=1;
                    
                }	
                elseif($get_data['User_Name']==$email)
                {
                    $flag2=1;
                    echo "HELLO";
                }
            }
            while($get_data=mysqli_fetch_assoc($run_query));
            if($flag1==1)
            {
                echo "<center><h1>You are alredy registered!!<br>";
				echo "Please login</h1></center>";
				header("refresh:2;Login.html");
                exit();
            }
            elseif($flag2==1)
            {
                echo "<center><h1><font color=red>Username is already exists!!</font><br>";
				echo "Please try other one</h1></center>";
				header("refresh:1;Signup.html");
               // header("Location:");
                exit();
            }
            if(strlen($pass)<=3)
            {
                echo "<h1><center><font color=red>Password is too sort!!</font>";
                echo "<br>Please try other one</h1></center>";
                header("refresh:1.5;Signup.html");
                exit();
            }
            $query = "INSERT INTO `users`(`User_Name`, `password`) VALUES ('" . $email . "','" . $pass . "')";

			if(mysqli_query($connect,$query)){
				echo "<center><h1>Registration Done!!</h1></center>";
                header("refresh:1.5;index.php");
   				exit();
			} 
			else{
    			echo "ERROR: Could not able to execute  " . mysqli_error($connect);
			}
		}

?>