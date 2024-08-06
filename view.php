<?php
session_start();
include("conn.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Student Details</title>
</head>
<body> <a href="logout.php">Logout</a>
    <h1>Student Details...</h1>
    <table border="2">
        <tr>
            <th>NO</th>
            <th>First name</th>
            <th>Lat name</th>
            <th>Age</th>
            <th>gender</th>
            <th>email</th>
            <th>phone</th>
            <th>Address</th>
            <th>Department</th>
            <th>Action</th>
</tr>
<?php
   $query = mysqli_query($dbcon, "SELECT student.*, department.name AS department_name FROM student LEFT JOIN department ON student.d_id = department.d_id");
  $i=1;
  while( $data = mysqli_fetch_array($query))
  {
    ?><tr>
        <td><?php echo $i++;?></td>
      <td><?php echo $data['fname'];?></td>
      <td><?php echo $data['lname'];?></td>
      <td><?php echo $data['age'];?></td>
      <td><?php echo $data['gender'];?></td>
      <td><?php echo $data['email'];?></td>
      <td><?php echo $data['phone'];?></td>
      <td><?php echo $data['address'];?></td>
      <td> <?php echo $data['department_name'];?></td>
      <td> <a href="delete.php?id=<?php echo $data['s_id']; ?>">Delete</a>
         <a href="update.php?id=<?php echo $data['s_id']; ?>">Update</a></td> 
    </tr>
    <?php
  }
?>
</table>
<br>
<a href="Register.php">Add Student</a><span>
    
</span>
</body>
</html>
