<?php
session_start();
include("conn.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = mysqli_query($dbcon, "SELECT * FROM student WHERE s_id='$id'");
    $data = mysqli_fetch_array($query);
} else {
    echo "No student selected!";
    exit;
}

if (isset($_POST['update'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $d_id = $_POST['d_id'];

    $updateQuery = "UPDATE student SET fname='$fname', lname='$lname', age='$age', gender='$gender', email='$email', phone='$phone', address='$address', d_id='$d_id' WHERE s_id='$id'";

    if (mysqli_query($dbcon, $updateQuery)) {
        echo "Record updated successfully!";
        header("Location: view.php"); 
    } else {
        echo "Error updating record: " . mysqli_error($dbcon);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Student Details</title>
</head>
<body>
    <h1>Update Student Details...</h1>
    <form method="post">
        First Name: <input type="text" name="fname" value="<?php echo $data['fname']; ?>"><br>
        Last Name: <input type="text" name="lname" value="<?php echo $data['lname']; ?>"><br>
        Age: <input type="text" name="age" value="<?php echo $data['age']; ?>"><br>
        Gender: <input type="text" name="gender" value="<?php echo $data['gender']; ?>"><br>
        Email: <input type="text" name="email" value="<?php echo $data['email']; ?>"><br>
        Phone: <input type="text" name="phone" value="<?php echo $data['phone']; ?>"><br>
        Address: <input type="text" name="address" value="<?php echo $data['address']; ?>"><br>
        Department ID: <input type="text" name="d_id" value="<?php echo $data['d_id']; ?>"><br><br>
        <input type="submit" name="update" value="Update">
    </form>
    <a href="view.php">Back to View Page</a>
</body>
</html>
