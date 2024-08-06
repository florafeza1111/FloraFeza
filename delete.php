<?php
session_start();
include("conn.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $deleteQuery = "DELETE FROM student WHERE s_id='$id'";

    if (mysqli_query($dbcon, $deleteQuery)) {
        echo "Record deleted successfully!";
        header("Location: view.php"); // Redirect back to the view page
    } else {
        echo "Error deleting record: " . mysqli_error($dbcon);
    }
} else {
    echo "No student selected!";
}
?>
