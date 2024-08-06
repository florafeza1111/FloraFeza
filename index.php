<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>WELCOME TO SDMS MANAGER</title>
</head>
<body>
	<h1>Login Here...</h1>
	<form action="" method="POST">
		USERNAME:<input type="text" name="username" placeholder="USERNAME"><br><br>
		PASSWORD:<input type="password" name="password" placeholder="PASSWORD"><br><br>
		<input type="submit" name="submit" value="Login">		
	</form>
	<?php
	$conn= mysqli_connect("localhost","root","","sdms");
	if(isset($_POST['submit'])){
		$username=$_POST['username'];
		$password=$_POST['password'];
		$login=mysqli_query($conn,"SELECT* from admin WHERE name='$username' AND password='$password'");
		if(mysqli_num_rows($login)==1){
			$_SESSION['name']=['name'=>$username];
			header('location:register.php');
		}
		else{
			echo "Failed to Login";
		}
	}
	?>

</body>
</html>