<?php
	session_start();
	ob_start();
	include 'includes/conn.php';

	if(isset($_POST['login'])){
		$email = $_POST['email'];
		$password = $_POST['password'];

		$sql = "SELECT * FROM users WHERE email = '$email' or deviceid = '$email'";
		$query = $conn->query($sql);

		if($query->num_rows < 1){
			$_SESSION['error'] = 'Cannot find the device';
		}
		else{
			$row = $query->fetch_assoc();
			if(password_verify($password, $row['password'])){
				if(!isset($row['authsuccess']))
				{
					if(is_int($email))
					{
						$_SESSION['id'] = $email;			
					}
					else 
					{
						$_SESSION['id'] = $row['deviceid'];	
					}
					header("Location: authuser.php?deviceid=".$_SESSION['id']);
					exit();
				}
				else 
				{
					if(is_int($email))
					{
						$_SESSION['id'] = $email;
						$_SESSION['username'] = $row['username'];
						$_SESSION['email'] = $row['email'];				
					}
					else 
					{
						$_SESSION['id'] = $row['deviceid'];
						$_SESSION['username'] = $row['username'];
						$_SESSION['email'] = $email;	
					}
				}
			}
			else{
				$_SESSION['error'] = 'Incorrect password';
			}
		}
		
	}
	else{
		$_SESSION['error'] = 'Input admin credentials first';
	}

	header('location: index.php');
	exit();

?>