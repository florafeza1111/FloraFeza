<?php
session_start();
include('conn.php');
if($_SESSION['name']==""){
	
	header('location:index.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>PAGE TO REGISTER AND MODIFY STUDENT DATE</title>
</head>
<body>
	<h6>Welcome Admin <?php
	$name=$_SESSION['name']['name'];
	 echo $name?></h6>  <a href="logout.php">Logout</a>
	<h2>Register Student Data...</h2>
	<form action="register.php" method="POST">
		<input type="hidden" name="id">
		First Name:<input type="text" name="fname" placeholder="First Name" required><br><br>
		Last Name:<input type="text" name="lname" placeholder="last Name" required><br><br>
		Age:<input type="number" name="age" placeholder="Age" max="100" min="18" required><br><br>
		Gender:<input type="radio" name="gender" value="female">Female<span>
			<input type="radio" name="gender" value="male">Male
		</span><br><br>
		Email:<input type="email" name="email" placeholder="Email"><br><br>
		Phone:<input type="text" name="phone" placeholder="phone"><br><br>
		Address:<input type="text" name="Address" placeholder="Address"><br><br>
		Department:
		<select  name="did" required="">
												<?php 
												$sqls=mysqli_query($dbcon,"SELECT * FROM department");
												while($rw=mysqli_fetch_array($sqls)){
													?>
													<option value="<?=$rw['d_id']?>"><?=$rw['name']?></option>
												<?php
												} 
												?>
												
												
											</select><br><br>
		<input type="submit" name="submit" value="Register"><span>
			<a href="view.php">View Registered Students</a>
		</span>
	</form>
    <?php
    if(isset($_POST['submit'])){
    $id=$_POST['id'];
	$fname= filter_var($_POST['fname'], FILTER_SANITIZE_STRING);
	$lname= filter_var($_POST['lname'], FILTER_SANITIZE_STRING);
	$age=filter_var($_POST['age'], FILTER_SANITIZE_NUMBER_INT);
	$gender= filter_var($_POST['gender'], FILTER_SANITIZE_STRING);
	$email=filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $phone=filter_var($_POST['phone'], FILTER_SANITIZE_NUMBER_INT);
    $Address=filter_var($_POST['Address'],FILTER_SANITIZE_STRING);
    $did=filter_var($_POST['did']);

   if (!preg_match("/^[a-zA-Z]*$/",$fname)) {
   	 echo "Name should not contain numbers";
   }
    elseif(!preg_match("/^[a-zA-Z]*$/",$lname)) {
    	echo " Name should not contain numbers";
    }
    elseif (!preg_match("/^(078|072|073)\d{7}$/",$phone)) {
    	echo "Invalid Phone number";
    }
   elseif (!preg_match("/^[a-zA-Z]*$/",$Address)) {
   	echo "Address should not contain numbers";
   }
    else{
    	$register=mysqli_query($dbcon,"INSERT INTO student VALUES('$id','$fname','$lname','$age','$gender','$email','$phone','$Address','$did')");
    
    	if ($register) {
    		echo "Student Registered well";
    	}
    else {
          echo "Error: " . mysqli_error($dbcon);
      }

    }
}
 

    ?>
</body>
</html>